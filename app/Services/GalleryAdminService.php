<?php

namespace App\Services;

use App\Models\Gallery;
use Illuminate\Support\Collection;

class GalleryAdminService
{
    /**
     * Retrieve all gallery records for admin editing.
     */
    public function getEditableItems(): Collection
    {
        return Gallery::query()
            ->with('user:id,name')
            ->latest('id')
            ->get();
    }

    /**
     * Update editable gallery fields.
     */
    public function updateItem(int $galleryId, array $payload): Gallery
    {
        $gallery = Gallery::query()->findOrFail($galleryId);

        $gallery->update([
            'title' => $payload['title'] ?? $gallery->title,
            'description' => $payload['description'] ?? $gallery->description,
            'image_url' => $payload['image_url'] ?? $gallery->image_url,
        ]);

        return $gallery;
    }
}