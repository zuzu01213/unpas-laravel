<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\post;

class PostController extends Controller
{
    public function index() {
        return view('posts', [
            'title'=> 'All posts',
            // "posts" => Post::all()
            "posts" => Post::latest()->get()

        ]);
    }

    public function show(Post $post){
        return view('post',[
            "title" => "Single Post",
            "post"=> $post

        ]);
    }

}
