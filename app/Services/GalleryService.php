<?php

namespace App\Services;

use App\Models\Gallery;

class GalleryService
{
    /**
     * Retrieve gallery items from the database and normalize them for the view layer.
     *
     * @return array<int, array{image: string, title: string, subtitle: string, description: string}>
     */
    public function getGalleryItems(int $limit = 12): array
    {
        return Gallery::query()
            ->with('user:id,name')
            ->latest()
            ->take($limit)
            ->get()
            ->map(function (Gallery $gallery): array {
                return [
                    'image' => $this->resolveImageUrl($gallery->image_url),
                    'title' => $gallery->title,
                    'subtitle' => $gallery->user?->name ?? 'Gallery Team',
                    'description' => $gallery->description ?? '',
                ];
            })
            ->values()
            ->all();
    }

    private function resolveImageUrl(string $imageUrl): string
    {
        if ($imageUrl === '' || str_starts_with($imageUrl, 'http')) {
            return $imageUrl;
        }

        return asset('storage/' . $imageUrl);
    }
}