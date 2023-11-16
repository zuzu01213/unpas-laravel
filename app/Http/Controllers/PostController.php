<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title'=> 'Halaman posts',
            "posts" => Post::all()
        ]);
    }
}
