Pusher.logToConsole = true;

var pusher = new Pusher("117e9cb180fd3b91cf23", {
    cluster: "mt1",
});

var channel = pusher.subscribe("my-channel");
channel.bind("my-event", function (data) {
    updateNotifications(data);
});

function updateNotifications(data) {
    const notificationMenu = document.querySelector(
        ".dropdown-menu.dropdown-menu-lg.dropdown-menu-right"
    );

    const newNotification = `
            <div class="dropdown-divider"></div>
            <a href="${data.article.url}" class="dropdown-item d-flex scrollbar-container">
                <i class="fas fa-envelope mr-2"></i>
                <div class="mr-3">
                    <h3 class="dropdown-item-title">${data.article.title}</h3>
                    <p class="text-sm text-muted">${data.article.author}</p>
                </div>
                <span class="float-right text-muted text-sm">${data.article.created_at}</span>
            </a>
        `;

    notificationMenu.insertAdjacentHTML("afterbegin", newNotification);

    const badge = document.querySelector(".navbar-badge");
    const currentCount = parseInt(badge.getAttribute("data-count"), 10) || 0;
    badge.setAttribute("data-count", currentCount + 1);
    badge.textContent = currentCount + 1;

    checkForNoNotifications();
}

function checkForNoNotifications() {
    const notificationMenu = document.querySelector(
        ".dropdown-menu.dropdown-menu-lg.dropdown-menu-right"
    );

    if (notificationMenu.children.length == 0) {
        notificationMenu.innerHTML =
            '<div class="dropdown-item">No Notifications</div>';
    }
}

document.addEventListener("DOMContentLoaded", checkForNoNotifications);
