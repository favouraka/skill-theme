<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Subscriber;
use Livewire\Component;

class CategorySubscriptionForm extends Component
{
    public $subscribedCategories = [];
    public $allCategories;

    public function mount()
    {
        $this->allCategories = Category::all();
        $this->subscribedCategories = auth()->user()?->subscriber?->categories->pluck('id')->toArray() ?? [];
    }

    public function subscribe()
    {
        $subscriber = auth()->user()->subscriber;
        $subscriber->categories()->sync($this->subscribedCategories);
        session()->flash('success', 'Your category subscriptions have been updated.');
    }

    public function render()
    {
        return view('livewire.category-subscription-form');
    }
}
