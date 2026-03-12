<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

//Guest Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/gallery', 'pages.gallery')->name('gallery');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/contact', 'pages.contact')->name('contact');

//Authenticated Routes
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
