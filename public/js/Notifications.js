 
    Pusher.logToConsole = true;

    var pusher = new Pusher('117e9cb180fd3b91cf23', {
        cluster: 'mt1',
    });

     function formatDate(dateString) {
        return dayjs(dateString).format('MMMM D, YYYY h:mm A');
    }

    const formattedDate = formatDate(data.article.created_at);
 
 
 
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        updateNotifications(data);
    });

    function updateNotifications(data) {
        const notificationMenu = document.querySelector(
            '.dropdown-menu.dropdown-menu-lg.dropdown-menu-right'
        );

        if (document.querySelector(`[data-id="${data.article.id}"]`)) {
            console.log('الإشعار موجود بالفعل.');
            return;
        }

        const newNotification = `
            <div class="dropdown-divider"></div>
            <a href="${data.article.url}" class="dropdown-item d-flex scrollbar-container" data-id="${data.article.id}">
                <i class="fas fa-envelope mr-2"></i>
                <div class="mr-3">
                    <h3 class="dropdown-item-title">${data.article.title}</h3>
                    <p class="text-sm text-muted">${data.article.author}</p>
                    <span class="float-right text-muted text-sm">${formatDate(data.article.created_at)}</span>
                </div>
            </a>
        `;

        notificationMenu.insertAdjacentHTML('afterbegin', newNotification);

        attachClickListener(data.article.id);

        saveNotification(data);

        const badge = document.querySelector('.navbar-badge');
        const currentCount = parseInt(badge.getAttribute('data-count'), 10) || 0;
        badge.setAttribute('data-count', currentCount + 1);
        badge.textContent = currentCount + 1;
    }

    function saveNotification(data) {
        let notifications = JSON.parse(localStorage.getItem('notifications')) || [];

        if (notifications.some(notification => notification.article.id === data.article.id)) {
            console.log('الإشعار محفوظ مسبقًا.');
            return;
        }

        notifications.push(data);
        localStorage.setItem('notifications', JSON.stringify(notifications));
    }

    function loadNotifications() {
        let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
        notifications.forEach(notification => {
            if (!document.querySelector(`[data-id="${notification.article.id}"]`)) {
                updateNotifications(notification);
            }
        });
    }

    function removeNotificationFromLocalStorage(id) {
        let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
        notifications = notifications.filter(notification => notification.article.id !== id);
        localStorage.setItem('notifications', JSON.stringify(notifications));
    }

    function attachClickListener(id) {
        const notificationElement = document.querySelector(`[data-id="${id}"]`);
        if (notificationElement) {
            notificationElement.addEventListener('click', function() {
                removeNotificationFromLocalStorage(id);

                const badge = document.querySelector('.navbar-badge');
                const currentCount = parseInt(badge.getAttribute('data-count'), 10) || 0;
                badge.setAttribute('data-count', Math.max(currentCount - 1, 0));
                badge.textContent = Math.max(currentCount - 1, 0);
            });
        }
    }

    document.addEventListener('DOMContentLoaded', loadNotifications);
 