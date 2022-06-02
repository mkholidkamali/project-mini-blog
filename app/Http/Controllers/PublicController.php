<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('public.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('public.show', compact('post'));
    }

    public function categoryIndex(Category $category)
    {
        $posts = Post::with('category')->where('category_id', '=', $category->id)->get();
        $category = $category->name;
        return view('public.category.index', compact('posts', 'category'));
    }
}
