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

    public function edit(Blog $blog): View
    {
        return view('blog-edit', compact('blog'));
    }
}
