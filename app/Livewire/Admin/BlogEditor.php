<?php

namespace App\Livewire\Admin;

use App\Services\BlogAdminService;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class BlogEditor extends Component
{
    use WithPagination;

    public bool $userOnly = false;

    public string $statusMessage = '';

    public ?int $deletedPostId = null;

    protected string $paginationTheme = 'tailwind';

    public function mount(bool $userOnly = false): void
    {
        $this->userOnly = $userOnly;
    }

    public function deletePost(int $postId, BlogAdminService $blogAdminService): void
    {
        if ($this->userOnly) {
            $blogAdminService->deleteUserPost($postId, (int) auth()->id());
        } else {
            $blogAdminService->deletePost($postId);
        }

        $this->deletedPostId = $postId;

        $this->statusMessage = 'Blog berhasil dihapus.';

        $this->resetPage();
    }

    public function render(): \Illuminate\View\View
    {
        $service = app(BlogAdminService::class);

        $posts = $this->userOnly
            ? $service->getUserEditablePosts((int) auth()->id(), 12)
            : $service->getEditablePosts(12);

        $posts->setCollection($posts->getCollection()->map(function ($post): array {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'category' => $post->category,
                'featured_image' => $post->featured_image,
                'is_featured' => (bool) $post->is_featured,
                'author_name' => $post->author?->name ?? 'Editorial Team',
                'excerpt' => Str::limit(strip_tags((string) $post->content), 140),
                'created_at' => optional($post->created_at)->format('M d, Y'),
            ];
        }));

        return view('livewire.admin.blog-editor', [
            'posts' => $posts,
            'isUserView' => $this->userOnly,
        ]);
    }
}