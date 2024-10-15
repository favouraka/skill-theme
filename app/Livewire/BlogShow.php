<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog as Post;

class BlogShow extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.blog-show');
    }
}
