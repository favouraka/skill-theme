<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class BlogIndex extends Component
{
    public function render()
    {
        $posts = Post::latest()->paginate(10);
        return view('livewire.blog-index', compact('posts'))
            ->layout('layouts.app');
    }
}
