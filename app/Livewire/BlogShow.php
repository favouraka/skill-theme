<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog as Post;

class BlogShow extends Component
{
    public Post $post;
    public $relatedPosts;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->relatedPosts = Post::where('id', '!=', $this->post->id)
            ->where('is_visible', true)
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.blog-show');
    }
}
