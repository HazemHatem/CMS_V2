<!-- start Header -->
<header class="col-12">


    <!-- start nav -->
    <nav class="col-8">

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route("home")}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article.index') }}">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.index') }}">Contact-us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('wishlist.index') }}">Wishlist</a>
            </li>
            <li class="nav-item">
                <div class="d-flex">
                    @if (Auth::user())
                    @if (Auth::user()->rule->name == 'author')
                    <a class="nav-link" href="{{ route('Author.dashboard.index') }}">Dashboard</a>
                    @elseif (Auth::user()->rule->name == 'admin' || Auth::user()->rule->name == 'manager')
                    <a class="nav-link" href="{{ route('Admin.dashboard') }}">Dashboard</a>
                    @else
                    <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </div>
                @else
                <a class="nav-link" href="{{ route('login.index') }}">Login</a>
                <a class="nav-link" href="{{ route('register.index') }}">Register</a>
                </div>
                @endif
            </li>
        </ul>
    </nav>
    <!-- end nav -->

    <!-- start logo -->
    <div class="logo col-4">
        <a class="h1" href="{{route("home")}}" style="color: white;   display: block;">{{ env('APP_NAME') }}</a>
        <!-- form search -->
        <form class="d-flex" action="{{route('article.index')}}" method="GET">
            <input class="form-control" id="search" type="search" name="search" placeholder="Search" aria-label="Search" style="height: 37px;">
            <button class="btn btn-outline-success" id="searchbtn" type="submit" style="height: 37px;"><i class="fas fa-search"></i></button>
        </form>
        <!-- end form search -->
    </div>
    <!--end  logo -->



</header>
<!-- end Header -->