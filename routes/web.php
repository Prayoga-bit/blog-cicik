<?php

use Illuminate\Support\Facades\Route;

//Guest Routes
Route::view('/', 'pages.home');
Route::view('/about', 'pages.about');
Route::view('/gallery', 'pages.gallery');
Route::view('/blog', 'pages.blog');
Route::view('/contact', 'pages.contact');

//Authenticated Routes
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
