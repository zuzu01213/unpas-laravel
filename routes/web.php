<?php
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PricingController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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

Route::any('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::any('/purchase/plan', [PricingController::class, 'purchasePlan'])->name('purchase.plan');

Route::get('/payment', function () {
    return view('payment', [
        'title' => 'Halaman Payment',
        'active' => 'payment',
    ]);
});

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/posts/create', [DashboardPostController::class, 'createPost'])->name('dashboard.posts.create');

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::any('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

