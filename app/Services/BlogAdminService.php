<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Collection;

class BlogAdminService
{
    /**
     * Retrieve blog records for admin editing.
     */
    public function getEditablePosts(): Collection
    {
        return Blog::query()
            ->with('author:id,name')
            ->latest('id')
            ->get();
    }

    /**
     * Update editable blog fields.
     */
    public function updatePost(int $postId, array $payload): Blog
    {
        $post = Blog::query()->findOrFail($postId);

        $post->update([
            'title' => $payload['title'] ?? $post->title,
            'slug' => $payload['slug'] ?? $post->slug,
            'content' => $payload['content'] ?? $post->content,
            'category' => $payload['category'] ?? null,
            'featured_image' => $payload['featured_image'] ?? null,
            'is_featured' => (bool) ($payload['is_featured'] ?? false),
        ]);

        return $post;
    }

    /**
     * Delete a blog post by id.
     */
    public function deletePost(int $postId): void
    {
        Blog::query()->whereKey($postId)->delete();
    }
}