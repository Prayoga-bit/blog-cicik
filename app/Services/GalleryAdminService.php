<?php
namespace App\Services;

use App\Models\Gallery;
use Illuminate\Pagination\LengthAwarePaginator;

class GalleryAdminService
{
    /**
     * Create a gallery item.
     */
    public function createItem(array $payload, int $userId): Gallery
    {
        return Gallery::query()->create([
            'title' => $payload['title'],
            'description' => $payload['description'] ?? null,
            'image_url' => $payload['image_url'],
            'user_id' => $userId,
        ]);
    }

    /**
     * Retrieve all gallery records for admin editing.
     */
    public function getEditableItems(int $perPage = 12): LengthAwarePaginator
    {
        return Gallery::query()
            ->with('user:id,name')
            ->latest('id')
            ->paginate($perPage);
    }

    /**
     * Retrieve gallery records for user editing (only their own).
     */
    public function getUserEditableItems(int $userId, int $perPage = 12): LengthAwarePaginator
    {
        return Gallery::query()
            ->where('user_id', $userId)
            ->with('user:id,name')
            ->latest('id')
            ->paginate($perPage);
    }

    /**
     * Retrieve one gallery item for editing.
     */
    public function findEditableItem(int $galleryId): Gallery
    {
        return Gallery::query()
            ->with('user:id,name')
            ->findOrFail($galleryId);
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

    /**
     * Update a user-owned gallery item.
     */
    public function updateUserItem(int $galleryId, int $userId, array $payload): Gallery
    {
        $gallery = Gallery::query()
            ->whereKey($galleryId)
            ->where('user_id', $userId)
            ->firstOrFail();

        $gallery->update([
            'title' => $payload['title'] ?? $gallery->title,
            'description' => $payload['description'] ?? $gallery->description,
            'image_url' => $payload['image_url'] ?? $gallery->image_url,
        ]);

        return $gallery;
    }

    /**
     * Delete a gallery item.
     */
    public function deleteItem(int $galleryId): void
    {
        Gallery::query()->whereKey($galleryId)->delete();
    }

    /**
     * Delete a user-owned gallery item.
     */
    public function deleteUserItem(int $galleryId, int $userId): void
    {
        Gallery::query()
            ->whereKey($galleryId)
            ->where('user_id', $userId)
            ->delete();
    }
}