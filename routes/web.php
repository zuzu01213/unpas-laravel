<?php

use App\Models\category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('about',[
        'title'=> 'Halaman About',
    ]);
});
Route::get('/home', function () {
    return view('home',[
        'title'=> 'Halaman Home',
    ]);
});
Route::get('/about', function () {
    return view('about',[
        'title'=> 'Halaman About',
        "nama"=> "Keenan Rahmanda",
        "class"=> "XII-RPL",
        "image"=> "produk-1.png",
    ]);
});


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('/categories/{category:slug}', function(category $category){
    return view('posts', [
        'title' => "Post by Category : $category->name",
        'posts' => $category->posts->load('category', 'author'),
    ]);
});

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/author/{author:username}', function(User $author ){
    return view('posts', [
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('category', 'author'),
    ]);
});

