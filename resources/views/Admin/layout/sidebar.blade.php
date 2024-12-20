<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ FileHelper::userimage(Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('Admin.profile.index') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('Admin.dashboard')}}" class="nav-link {{request()->routeIs('Admin.dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">CATEGORIES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.category.*') ? 'active' : ''}}">
                        <i class="bi bi-tags-fill"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.category.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">AUTHORS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.author.*') ? 'active' : ''}}">
                        <i class="fa-solid fa-feather"></i>
                        <p>
                            Authors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.author.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Authors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.author.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Author</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">ARTICLES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.article.*') ? 'active' : ''}}">
                        <i class="fa-solid fa-newspaper"></i>
                        <p>
                            Articles
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.article.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Articles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.article.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Article</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">COMMENTS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.comment.*') ? 'active' : ''}}">
                        <i class="fa-solid fa-comments"></i>
                        <p>
                            Comments
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.comment.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Comments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.comment.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Comment</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">USERS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.user.*') ? 'active' : ''}}">
                        <i class="bi bi-people-fill"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.user.index')}}" class="nav-link">
                                <i class="bi bi-people-fill"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.user.create')}}" class="nav-link">
                                <i class="bi bi-person-fill-add"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (Gate::forUser(Auth::user())->check('manager'))
                <li class="nav-header">ADMINS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.admin.*') ? 'active' : ''}}">
                        <i class="bi bi-people-fill"></i>
                        <p>
                            Admins
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.admin.index')}}" class="nav-link">
                                <i class="bi bi-people-fill"></i>
                                <p>All Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.admin.create')}}" class="nav-link">
                                <i class="bi bi-person-fill-add"></i>
                                <p>Create Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">RULES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.rule.*') ? 'active' : ''}}">
                        <i class="bi bi-file-earmark-ruled-fill"></i>
                        <p>
                            Rules
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.rule.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Rules</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.rule.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Rule</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-header">PAGES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.contact') ? 'active' : ''}}" style="margin-left: -3px;">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.contact')}}" class="nav-link" style="margin-left: 8px;">
                                <i class="bi bi-chat-dots-fill"></i>
                                <p>All Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Admin.profile.index') }}" class="nav-link" style="margin-left: 8px;">
                                <i class="bi bi-person-circle"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Admin.wishlist.index') }}" class="nav-link" style="margin-left: 8px;">
                                <i class="bi bi-heart-fill"></i>
                                <p>Wishlist</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.setting.*') ? 'active' : ''}}">
                        <i class="bi bi-gear-fill"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.setting.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.setting.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">AUTH</li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" class="nav-link" method="POST">
                        @csrf
                        <button type="submit" class="d-flex w-100" id="logout">
                            <i class="bi bi-box-arrow-right mr-1"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    #logout {
        border: none;
        cursor: pointer;
        background: transparent;
        color: #d0d4db;
        margin-left: -3px;
    }

    #logout:hover {
        color: white;
    }
</style>