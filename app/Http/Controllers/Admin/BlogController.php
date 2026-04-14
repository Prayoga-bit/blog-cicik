<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\View\View;

class BlogController extends Controller
{
	public function index(): View
	{
		return view('blog');
	}

    public function create(): View
    {
        return view('blog-create', [
            'isUserView' => false,
        ]);
    }

    public function edit(Blog $blog): View
    {
        return view('blog-edit', [
            'blog' => $blog,
            'isUserView' => false,
        ]);
    }

    public function userIndex(): View
    {
        return view('user-blog');
    }

    public function userCreate(): View
    {
        return view('blog-create', [
            'isUserView' => true,
        ]);
    }

    public function userEdit(Blog $blog): View
    {
        if ($blog->author_id !== auth()->id()) {
            abort(403, 'Unauthorized to edit this blog.');
        }

        return view('blog-edit', [
            'blog' => $blog,
            'isUserView' => true,
        ]);
    }
}
