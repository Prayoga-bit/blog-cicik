<?php

use App\Http\Controllers\Admin\PageSectionController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ProjectAreaController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('page-section', [PageSectionController::class, 'index'])->name('page-section');
        Route::get('team-members', [TeamMemberController::class, 'index'])->name('team-members');
        Route::get('team-members/create', [TeamMemberController::class, 'create'])->name('team-members.create');
        Route::get('team-members/{teamMember}/edit', [TeamMemberController::class, 'edit'])->name('team-members.edit');
        Route::get('project-areas', [ProjectAreaController::class, 'index'])->name('project-areas');
        Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages');
        Route::get('gallery-editor', [GalleryController::class, 'index'])->name('gallery-editor');
        Route::get('gallery-editor/create', [GalleryController::class, 'create'])->name('gallery-editor.create');
        Route::get('gallery-editor/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery-editor.edit');
        Route::get('blog-editor', [BlogController::class, 'index'])->name('blog-editor');
        Route::get('blog-editor/create', [BlogController::class, 'create'])->name('blog-editor.create');
        Route::get('blog-editor/{blog}/edit', [BlogController::class, 'edit'])->name('blog-editor.edit');
    });
    
    // User-specific routes (for regular users)
    Route::get('user/gallery', [GalleryController::class, 'userIndex'])->name('user.gallery-editor');
    Route::get('user/gallery/create', [GalleryController::class, 'userCreate'])->name('user.gallery-editor.create');
    Route::get('user/gallery/{gallery}/edit', [GalleryController::class, 'userEdit'])->name('user.gallery-editor.edit');
    Route::get('user/blog', [BlogController::class, 'userIndex'])->name('user.blog-editor');
    Route::get('user/blog/create', [BlogController::class, 'userCreate'])->name('user.blog-editor.create');
    Route::get('user/blog/{blog}/edit', [BlogController::class, 'userEdit'])->name('user.blog-editor.edit');
});
    

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
