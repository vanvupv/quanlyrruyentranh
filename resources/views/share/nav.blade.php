<!-- Header -->
<header class="header-style-2" id="home">
    <div class="main-header navbar-searchbar m-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="{{route('home')}}">
                                    <img src="{{asset("assets/images/fahasa-logo.png")}}" class="h-logo img-fluid blur-up lazyload" alt="logo">
                                </a>
                            </div>
                        </div>

                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">
                                    <div class="toggle-nav">
                                        <i class="fa fa-bars sidebar-bar"></i>
                                    </div>
                                    <ul class="nav-menu">
                                        <li class="back-btn d-xl-none">
                                            <div class="close-btn">
                                                Menu
                                                <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                    </span>
                                            </div>
                                        </li>
                                        <li><a href="{{route('home')}}" class="nav-link menu-title {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"> Trang Chủ </a></li>
                                        <li><a href="{{route('home.shop')}}" class="nav-link menu-title {{ Route::currentRouteName() == 'home.shop' ? 'active' : '' }}"> Cửa Hàng </a></li>
                                        <li><a href="{{route('cart')}}" class="nav-link menu-title {{ Route::currentRouteName() == 'cart' ? 'active' : '' }}"> Giỏ Hàng </a></li>
                                        <li><a href="#" class="nav-link menu-title"> Về Chúng Tôi </a></li>
                                        <li><a href="#" class="nav-link menu-title"> Liên Hệ </a></li>
                                        <li><a href="#" class="nav-link menu-title"> Bài Viết </a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="menu-right">
                            <ul>
                                <li>
                                    <div class="search-box theme-bg-color">
                                        <i data-feather="search"></i>
                                    </div>
                                </li>
                                <li class="onhover-dropdown wislist-dropdown">
                                    <div class="cart-media">
                                        <a href="wishlist/list.html">
                                            <i data-feather="heart"></i>
                                            <span id="wishlist-count" class="label label-theme rounded-pill">
                                                    0
                                                </span>
                                        </a>
                                    </div>
                                </li>
                                <li class="onhover-dropdown wislist-dropdown">
                                    <div class="cart-media">
                                        <a href="{{route('cart')}}">
                                            <i data-feather="shopping-cart"></i>
                                            <span id="cart-count" class="label label-theme rounded-pill">
                                                {{Cart::instance('cart')->content()->count()}}
                                            </span>
                                        </a>
                                    </div>
                                </li>

                                @if(Auth::check())
                                    <li class="onhover-dropdown">
                                        <div class="cart-media name-usr">
                                            <i data-feather="user"></i> {{ Auth::user()->name }}
                                        </div>
                                        <div class="onhover-div profile-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('logout') }}" class="d-block">Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @else
                                    <li class="onhover-dropdown">
                                        <div class="cart-media name-usr">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="onhover-div profile-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('login') }}" class="d-block">Login</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('register') }}" class="d-block">Register</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <div class="search-full">
                            <form method="GET" class="search-full" action="http://localhost:8000/search">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="search" class="font-light"></i>
                                    </span>
                                    <input type="text" name="q" class="form-control search-type" placeholder="Search here...">
                                    <span class="input-group-text close-search">
                                        <i data-feather="x" class="font-light"></i>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- / Header -->

<!-- Menu -->
<div class="mobile-menu d-sm-none">
    <ul>
        <li>
            <a href="demo3.php" class="active">
                <i data-feather="home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="align-justify"></i>
                <span>Category</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="shopping-bag"></i>
                <span>Cart</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="heart"></i>
                <span>Wishlist</span>
            </a>
        </li>
        <li>
            <a href="user-dashboard.php">
                <i data-feather="user"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</div>
<!-- / Menu -->


