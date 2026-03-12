<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ProjectArea;
use App\Services\PageContentService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(private PageContentService $cms) {}

    public function home(): View
    {
        $sections = $this->cms->getSections('home');

        $projectAreas = ProjectArea::all();

        // Latest featured blog posts for the insights section (placeholder until blog seeder exists)
        $latestPosts = Blog::with('author')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.home', compact('sections', 'projectAreas', 'latestPosts'));
    }
}
