<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostLimitController;
class PostController extends Controller
{


    public function index() {
        $title = '';
        $categories = Category::paginate(7);

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by: ' . $author->name;
        }

        return view('posts', [
            'title' => 'All Posts' . $title,
            'active' => 'posts',
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(13)->withQueryString(),
            'categories' => $categories,
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            "title" => "Single Post",
            'active' => 'posts',
            "post" => $post
        ]);

    }

}

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::paginate(Category::count()); // Paginate with all categories

    return view('categories.index', ['categories' => $categories]);
}

}
