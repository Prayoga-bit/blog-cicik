<?php

use App\Http\Controllers\Admin\PageSectionController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ProjectAreaController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\GalleryController;
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

Route::get('page-section', [PageSectionController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('page-section');

Route::get('team-members', [TeamMemberController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('team-members');

Route::get('project-areas', [ProjectAreaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('project-areas');

Route::get('contact-messages', [ContactMessageController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('contact-messages');

Route::get('gallery-editor', [GalleryController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('gallery-editor');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
