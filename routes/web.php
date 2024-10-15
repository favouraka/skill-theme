<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogIndex;
use App\Livewire\BlogShow;

Route::get('/', App\Livewire\Landing::class)->name('index');

// Blog routes
Route::get('/blog', BlogIndex::class)->name('blog.index');
Route::get('/blog/create', App\Livewire\CreateBlogPost::class)->name('blog.create');
Route::get('/blog/{post}', BlogShow::class)->name('blog.show');
