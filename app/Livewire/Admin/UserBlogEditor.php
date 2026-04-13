<?php

namespace App\Livewire\Admin;

use App\Services\BlogAdminService;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class UserBlogEditor extends Component
{
    use WithPagination;

    public string $statusMessage = '';

    public ?int $deletedPostId = null;

    protected string $paginationTheme = 'tailwind';

    public function deletePost(int $postId, BlogAdminService $blogAdminService): void
    {
        $post = \App\Models\Blog::findOrFail($postId);
        
        // Ensure user can only delete their own posts
        if ($post->author_id !== auth()->id()) {
            abort(403, 'Unauthorized to delete this blog.');
        }

        $blogAdminService->deletePost($postId);

        $this->deletedPostId = $postId;

        $this->statusMessage = 'Blog berhasil dihapus.';

        $this->resetPage();
    }

    public function render(): \Illuminate\View\View
    {
        $posts = app(BlogAdminService::class)
            ->getUserEditablePosts(auth()->id(), 12);

        $posts->setCollection($posts->getCollection()->map(function ($post): array {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'category' => $post->category,
                'featured_image' => $post->featured_image,
                'is_featured' => (bool) $post->is_featured,
                'author_name' => $post->author?->name ?? 'You',
                'excerpt' => Str::limit(strip_tags((string) $post->content), 140),
                'created_at' => optional($post->created_at)->format('M d, Y'),
            ];
        }));

        return view('livewire.admin.blog-editor', [
            'posts' => $posts,
        ]);
    }
}
