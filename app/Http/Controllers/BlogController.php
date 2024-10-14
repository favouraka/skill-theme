<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show(Blog $post)
    {
        $relatedPosts = Blog::where('id', '!=', $post->id)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
