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

// Event routes with visibility check
Route::prefix('events')->group(function () {
    Route::get('/', function () {
        if (!config('events.enabled', false)) {
            abort(404);
        }
        return app(EventList::class)->render();
    })->name('events.index');
    
    Route::get('/{event}', function ($event) {
        if (!config('events.enabled', false)) {
            abort(404);
        }
        return app(EventShow::class, ['event' => $event])->render();
    })->name('events.show');
});

