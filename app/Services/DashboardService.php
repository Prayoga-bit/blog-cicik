<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\User;

class DashboardService
{
    /**
     * Build dashboard statistics based on the user's role.
     *
     * @return array{blogCount:int,galleryCount:int}
     */
    public function getStatsForUser(User $user): array
    {
        if ($user->is_admin) {
            return [
                'blogCount' => Blog::count(),
                'galleryCount' => Gallery::count(),
            ];
        }

        return [
            'blogCount' => Blog::query()->where('author_id', $user->id)->count(),
            'galleryCount' => Gallery::query()->where('user_id', $user->id)->count(),
        ];
    }
}
