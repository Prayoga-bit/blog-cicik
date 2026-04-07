<?php

namespace App\Livewire\Admin;

use App\Services\BlogAdminService;
use Livewire\Component;
use Illuminate\Support\Str;

class BlogEditor extends Component
{
    public array $posts = [];

    public ?int $deletedPostId = null;

    public function mount(BlogAdminService $blogAdminService): void
    {
        $this->posts = $blogAdminService->getEditablePosts()
            ->map(function ($post): array {
                $excerpt = Str::limit(strip_tags((string) $post->content), 140);

                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'category' => $post->category,
                    'featured_image' => $post->featured_image,
                    'is_featured' => (bool) $post->is_featured,
                    'author_name' => $post->author?->name ?? 'Editorial Team',
                    'excerpt' => $excerpt,
                    'created_at' => optional($post->created_at)->format('M d, Y'),
                ];
            })
            ->all();
    }

    public function deletePost(int $postId, BlogAdminService $blogAdminService): void
    {
        $blogAdminService->deletePost($postId);

        $this->posts = array_values(array_filter(
            $this->posts,
            fn (array $post) => (int) $post['id'] !== $postId
        ));

        $this->deletedPostId = $postId;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.blog-editor');
    }
}