<?php
namespace App\Services;

use App\Models\Blog;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogAdminService
{
    /**
     * Create a blog post.
     */
    public function createPost(array $payload, int $authorId): Blog
    {
        return Blog::query()->create([
            'title' => $payload['title'],
            'slug' => $payload['slug'],
            'content' => $payload['content'],
            'category' => $payload['category'] ?? null,
            'featured_image' => $payload['featured_image'] ?? null,
            'is_featured' => (bool) ($payload['is_featured'] ?? false),
            'author_id' => $authorId,
        ]);
    }

    /**
     * Retrieve blog records for admin editing.
     */
    public function getEditablePosts(int $perPage = 12): LengthAwarePaginator
    {
        return Blog::query()
            ->withRichText('content')
            ->select([
                'id',
                'title',
                'slug',
                'category',
                'featured_image',
                'is_featured',
                'author_id',
                'created_at',
            ])
            ->with('author:id,name')
            ->latest('id')
            ->paginate($perPage);
    }

    /**
     * Retrieve blog records for user editing (only their own).
     */
    public function getUserEditablePosts(int $userId, int $perPage = 12): LengthAwarePaginator
    {
        return Blog::query()
            ->where('author_id', $userId)
            ->withRichText('content')
            ->select([
                'id',
                'title',
                'slug',
                'category',
                'featured_image',
                'is_featured',
                'author_id',
                'created_at',
            ])
            ->with('author:id,name')
            ->latest('id')
            ->paginate($perPage);
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
            'content' => $payload['content'] ?? $post->content?->toEditorHtml(),
            'category' => $payload['category'] ?? null,
            'featured_image' => $payload['featured_image'] ?? null,
            'is_featured' => (bool) ($payload['is_featured'] ?? false),
        ]);

        return $post;
    }

    /**
     * Update a user-owned blog post.
     */
    public function updateUserPost(int $postId, int $userId, array $payload): Blog
    {
        $post = Blog::query()
            ->whereKey($postId)
            ->where('author_id', $userId)
            ->firstOrFail();

        $post->update([
            'title' => $payload['title'] ?? $post->title,
            'slug' => $payload['slug'] ?? $post->slug,
            'content' => $payload['content'] ?? $post->content?->toEditorHtml(),
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

    /**
     * Delete a user-owned blog post.
     */
    public function deleteUserPost(int $postId, int $userId): void
    {
        Blog::query()
            ->whereKey($postId)
            ->where('author_id', $userId)
            ->delete();
    }
}