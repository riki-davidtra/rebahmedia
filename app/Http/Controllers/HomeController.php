<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(4)->get();
        $categories = Category::all();

        return view('index', compact('posts', 'categories'));
    }

    public function post()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function postShow($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post.show', compact('post'));
    }
}
