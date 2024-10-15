<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;

class BlogIndex extends Component
{
    public function render()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('livewire.blog-index', compact('blogs'));
    }
}
