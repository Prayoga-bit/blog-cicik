<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
	public function index(): View
	{
		return view('gallery');
	}

	public function create(): View
	{
		return view('gallery-create', [
			'isUserView' => false,
		]);
	}

	public function userIndex(): View
	{
		return view('user-gallery');
	}

	public function userCreate(): View
	{
		return view('gallery-create', [
			'isUserView' => true,
		]);
	}

	public function edit(Gallery $gallery): View
	{
		return view('gallery-edit', [
			'gallery' => $gallery,
			'isUserView' => false,
		]);
	}

	public function userEdit(Gallery $gallery): View
	{
		if ($gallery->user_id !== auth()->id()) {
			abort(403, 'Unauthorized to edit this gallery item.');
		}

		return view('gallery-edit', [
			'gallery' => $gallery,
			'isUserView' => true,
		]);
	}
}
