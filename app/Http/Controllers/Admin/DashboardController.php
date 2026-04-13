<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private DashboardService $dashboardService,
    ) {}

    public function index(): View
    {
        $user = auth()->user();

        $stats = $this->dashboardService->getStatsForUser($user);

        return view('dashboard', [
            'userName' => $user->name,
            'isAdmin' => (bool) $user->is_admin,
            'blogCount' => $stats['blogCount'],
            'galleryCount' => $stats['galleryCount'],
        ]);
    }
}
