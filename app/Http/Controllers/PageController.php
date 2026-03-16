<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ProjectArea;
use App\Models\TeamMember;
use App\Services\GalleryService;
use App\Services\PageContentService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        private PageContentService $cms,
        private GalleryService $galleryService,
    ) {}

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

    public function gallery(): View
    {
        $sections = $this->cms->getSections('gallery');
        $galleryItems = $this->galleryService->getGalleryItems();

        return view('pages.gallery', compact('sections', 'galleryItems'));
    }

    public function about(): View
    {
        $sections = $this->cms->getSections('about');
        $teamMembers = TeamMember::query()->latest()->take(4)->get();

        return view('pages.about', compact('sections', 'teamMembers'));
    }
}
