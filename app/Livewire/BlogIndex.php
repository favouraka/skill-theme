<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('livewire.blog-index', compact('blogs'));
    }
}
