<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

//Guest Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{blog:slug}', [PageController::class, 'blogDetail'])->name('blog.read');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

//Authenticated Routes
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
