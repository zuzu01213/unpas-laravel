<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/posts', function () {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Sandika Galih",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint aliquid asperiores quia repellat reprehenderit sapiente fugit natus qui? Doloremque perferendis magnam nihil temporibus! Dolore est eligendi sapiente itaque, beatae provident inventore dicta distinctio nesciunt nisi a quae quidem laboriosam. Cumque porro nulla non asperiores quae expedita vel, aperiam, consequuntur facilis fuga sint magni fugit quam aliquam voluptatum, necessitatibus harum dolore reiciendis nobis dolores? Qui totam, eius, possimus accusantium soluta minima maxime rem, aspernatur molestias placeat dolore culpa provident in consequatur suscipit! Sed rerum amet voluptatibus quis, magnam est sapiente laborum, nihil, aut repellendus ducimus assumenda repellat. Laboriosam, consectetur quos. Iste?",
            "slug" => "Judul Post Pertama",
        ],
        [ 
            "title" => "Judul Post Kedua",
            "author" => "Keenan Rahmanda",
            "slug" => "Judul Post kEDUA",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint aliquid asperiores quia repellat reprehenderit sapiente fugit natus qui? Doloremque perferendis magnam nihil temporibus! Dolore est eligendi sapiente itaque, beatae provident inventore dicta distinctio nesciunt nisi a quae quidem laboriosam. Cumque porro nulla non asperiores quae expedita vel, aperiam, consequuntur facilis fuga sint magni fugit quam aliquam voluptatum, necessitatibus harum dolore reiciendis nobis dolores? Qui totam, eius, possimus accusantium soluta minima maxime rem, aspernatur molestias placeat dolore culpa provident in consequatur suscipit! Sed rerum amet voluptatibus quis, magnam est sapiente laborum, nihil, aut repellendus ducimus assumenda repellat. Laboriosam, consectetur quos. Iste? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores delectus libero quidem iure nihil optio molestiae. Explicabo magnam voluptate similique nobis earum quasi, a minima quibusdam hic dicta asperiores inventore.",
        ]  
    ];
    return view('posts',[
        'title'=> 'Halaman posts',
        "posts" => $blog_posts,
    ]);
});

Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Sandika Galih",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint aliquid asperiores quia repellat reprehenderit sapiente fugit natus qui? Doloremque perferendis magnam nihil temporibus! Dolore est eligendi sapiente itaque, beatae provident inventore dicta distinctio nesciunt nisi a quae quidem laboriosam. Cumque porro nulla non asperiores quae expedita vel, aperiam, consequuntur facilis fuga sint magni fugit quam aliquam voluptatum, necessitatibus harum dolore reiciendis nobis dolores? Qui totam, eius, possimus accusantium soluta minima maxime rem, aspernatur molestias placeat dolore culpa provident in consequatur suscipit! Sed rerum amet voluptatibus quis, magnam est sapiente laborum, nihil, aut repellendus ducimus assumenda repellat. Laboriosam, consectetur quos. Iste?",
            "slug" => "Judul Post Pertama",
        ],
        [ 
            "title" => "Judul Post Kedua",
            "author" => "Keenan Rahmanda",
            "slug" => "Judul Post kEDUA",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint aliquid asperiores quia repellat reprehenderit sapiente fugit natus qui? Doloremque perferendis magnam nihil temporibus! Dolore est eligendi sapiente itaque, beatae provident inventore dicta distinctio nesciunt nisi a quae quidem laboriosam. Cumque porro nulla non asperiores quae expedita vel, aperiam, consequuntur facilis fuga sint magni fugit quam aliquam voluptatum, necessitatibus harum dolore reiciendis nobis dolores? Qui totam, eius, possimus accusantium soluta minima maxime rem, aspernatur molestias placeat dolore culpa provident in consequatur suscipit! Sed rerum amet voluptatibus quis, magnam est sapiente laborum, nihil, aut repellendus ducimus assumenda repellat. Laboriosam, consectetur quos. Iste? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores delectus libero quidem iure nihil optio molestiae. Explicabo magnam voluptate similique nobis earum quasi, a minima quibusdam hic dicta asperiores inventore.",
        ]  
    ];
    $new_post=[];
    foreach ($blog_posts as $post ) {
        if($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    return view('post',[
        "title" => "Single Post",
        "post"=> $new_post,
    
    ]);
});
