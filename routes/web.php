<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;




Route::get('/', function () {
    return view('home', [
        'title' => 'Halaman Home',
        'active' => 'home',
    ]);
});
Route::get('/home', function () {
    return view('home', [
        'title' => 'Halaman Home',
        'active' => 'home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'Halaman About',
        'nama' => 'Keenan Rahmanda',
        'class' => 'XII-RPL',
        'image' => 'produk-1.png',
        'active' => 'About',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/posts?categories={category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "All Post in Category: $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author'),
    ]);
});

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);



