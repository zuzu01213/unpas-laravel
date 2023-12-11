<nav class="navbar navbar-expand-lg navbar-light fixed-top hide">
    <a class="navbar-brand" href="/home">K's</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('home', '/') ? 'active' : '' }}">
                <a class="nav-link" href="/home">Home</a>
            </li>
            <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                <a class="nav-link" href="/about">About Creator</a>
            </li>
            <li class="nav-item {{ request()->is('posts') ? 'active' : '' }}">
                <a class="nav-link" href="/posts">All Blog</a>
            </li>
            <li class="nav-item {{ request()->is('categories') ? 'active' : '' }}">
                <a class="nav-link" href="/categories/">Categories</a>
            </li>
            <li class="nav-item {{ request()->is('pricing') ? 'active' : '' }}">
                <a class="nav-link" href="/pricing/">Pricing</a>
            </li>
            <li class="nav-item {{ request()->is('my-project') ? 'active' : '' }}">
                <a class="nav-link" href="http://coba-laravel-2.test/3?jumlahProduk=10&generateButton=#" target="_blank">My Project</a>
            </li>

        </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Welcome Back, {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                  </li>
                @else
                <li class="nav-item login-link {{ request()->is('login', 'register') ? 'active' : '' }}">
                    <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                @endauth
            </ul>
    </div>
</nav>
@if(request()->is('home', 'about', 'login', 'register', 'categories','/', 'pricing', 'payment'))
    <style>
        .nav-kedua {
            display: none;
        }
    </style>

@endif
<div class="nav-kedua ">
    <header >

        <nav class="nav nav-underline justify-content-around">
            @foreach($categories as $category)
            <a class="nav-item nav-link {{ request('category') === $category->slug ? 'link-body-emphasis active' : 'link-body-emphasis' }}" href="/posts?category={{ $category->slug }}">
                {{ $category->name }}
            </a>
            @endforeach
        </nav>
    </header>
</div>


<style>
    body {
        padding-top: 56px;
        scroll-behavior: smooth;
    }

    nav {
        background-color: black;
        transition: background-color 0.3s ease;
    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: whitesmoke;
        transition: color 0.3s ease;
    }

    .navbar-toggler-icon {
        background-color: whitesmoke;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-nav .nav-item.active .nav-link,
    .navbar-nav .nav-item.login-link.active .nav-link {
        font-weight: bold;
        color: brown;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-item.login-link .nav-link:hover {
        color: lightcoral;
    }

    ul {
        margin-left: 30px;
        margin-right: 50px;
    }

    .navbar-brand {
        margin-left: 30px;
        margin-right: 0px;
        font-size: 20px;
        color: brown;
    }

    h1 {
        text-align: center;
    }

    /* Navbar Dropdown Styles */
    .navbar-nav .nav-link.dropdown-toggle {
        color: whitesmoke;
    }

    /* Change color when any dropdown item is active */
    .navbar-nav .nav-item.dropdown.show .nav-link.dropdown-toggle,
    .navbar-nav .nav-item.dropdown:hover .nav-link.dropdown-toggle {
        color: brown;
    }

    /* Hover effect for dropdown toggle */
    .navbar-nav .nav-link.dropdown-toggle:hover {
        color: lightcoral;
    }

    .dropdown-menu a {
        color: black;
    }

    .dropdown-menu a:hover {
        background-color: brown;
        color: white;
    }

    /* Additional styles for smooth transitions */
    .dropdown-menu {
        transition: opacity 0.3s ease;
    }

    .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
    }

    .navbar-nav .nav-item.dropdown .dropdown-menu {
        opacity: 0;
        visibility: hidden;
    }

    .nav.nav-underline.justify-content-around a {
        color: white !important; /* Change link text color to white */
    }

    .nav.nav-underline.justify-content-around a.link-body-emphasis.active {
        color: brown !important; /* Change link text color to brown for active links */
    }

    .nav.nav-underline.justify-content-around a:hover {
        color: lightcoral; /* Change link text color on hover to lightcoral or any color you prefer */
    }
</style>

@if(request()->is( 'home', '/' ))
    <style>
        nav {
            background-color: transparent;
            position: absolute;
            z-index: 9999;
            width: 100%;
            top: 0;
            left: 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .navbar-brand,
    .navbar-nav .nav-link {
        color: WHITE;
        transition: color 0.3s ease;
        position: relative;
        z-index: 123142142142132112321;

    }

    </style>
    <script>

    </script>
@endif
@if(request()->is( 'pricing', ))
    <style>
    .dropdown-menu a {
      padding-bottom: 15px;
    }
    </style>

@endif
