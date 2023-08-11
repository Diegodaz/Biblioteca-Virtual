<?php

use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('papers/', [PaperController::class, 'index'])->name('papers.index');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('events', [EventsController::class, 'index'])->name('events.index');


require __DIR__ . '/auth.php';
