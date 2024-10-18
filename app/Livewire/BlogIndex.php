<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = 'latest';
    public $queryString = ['search', 'filter'];

    public function getBlogsProperty()
    {
        $query = Blog::query();

        if ($this->search) {
            $query->where('title', 'like', '%'.$this->search.'%')
                  ->orWhere('excerpt', 'like', '%'.$this->search.'%')
                  ->orWhere('content', 'like', '%'.$this->search.'%');
        }

        switch ($this->filter) {
            case 'oldest':
                $query->orderBy('published_at');
                break;
            case 'this_week':
                $query->whereBetween('published_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()]);
                break;
            case 'latest':
            default:
                $query->orderBy('published_at', 'desc');
        }

        return $query->paginate(9);
    }

    public function render()
    {
        return view('livewire.blog-index', ['blogs' => $this->blogs]);
    }
}
