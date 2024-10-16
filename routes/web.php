<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogIndex;
use App\Livewire\BlogShow;
use App\Livewire\CategorySubscriptionForm;

Route::get('/', App\Livewire\Landing::class)->name('index');

// Blog routes
Route::get('/blog', BlogIndex::class)->name('blog.index');
Route::get('/blog/{post}', BlogShow::class)->name('blog.show');

// Category subscription route
Route::get('/category-subscription', CategorySubscriptionForm::class)->name('category.subscription');
use App\Http\Livewire\EventList;
use App\Http\Livewire\EventShow;

Route::get('/events', EventList::class)->name('events.list');
Route::get('/events/{event}', EventShow::class)->name('events.show');
