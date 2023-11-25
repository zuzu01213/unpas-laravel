<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="#">K's</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
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
@if(request()->is('home', 'about', 'login', 'register'))
    <style>
        .nav-kedua {
            display: none;
        }
    </style>
@endif
    <div class="nav-kedua" style="background-color: gray !important">
    <nav class="nav nav-underline justify-content-between" >
      <a class="nav-item nav-link link-body-emphasis active" href="#">World</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">U.S.</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Technology</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Design</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Culture</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Business</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Politics</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Opinion</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Science</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Health</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Style</a>
      <a class="nav-item nav-link link-body-emphasis" href="#">Travel</a>
    </nav>
</div>
<style>
body {
    padding-top: 56px;
    scroll-behavior: smooth;
}
.nav.nav-underline.justify-content-between a {
    color: white !important; /* Change link text color to white */
}

.nav.nav-underline.justify-content-between a:hover {
    color: lightcoral; /* Change link text color on hover to lightcoral or any color you prefer */
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


</style>
