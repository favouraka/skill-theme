<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogIndex;
use App\Livewire\BlogShow;
use App\Livewire\CategorySubscriptionForm;

use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('index');

// Blog routes
Route::get('/blog', BlogIndex::class)->name('blog.index');
Route::get('/blog/{post}', BlogShow::class)->name('blog.show');

// Category subscription route
Route::get('/category-subscription', CategorySubscriptionForm::class)->name('category.subscription');
use App\Http\Livewire\EventList;
use App\Http\Livewire\EventShow;

Route::get('/events', EventList::class)->name('events.index');
Route::get('/events/{event}', EventShow::class)->name('events.show');
