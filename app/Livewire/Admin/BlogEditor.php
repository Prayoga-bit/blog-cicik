<?php

namespace App\Livewire\Admin;

use App\Services\BlogAdminService;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BlogEditor extends Component
{
    public array $posts = [];

    public ?int $savedPostId = null;

    public string $statusMessage = '';

    public function mount(BlogAdminService $blogAdminService): void
    {
        $this->posts = $blogAdminService->getEditablePosts()
            ->map(function ($post): array {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'content' => $post->content,
                    'category' => $post->category,
                    'featured_image' => $post->featured_image,
                    'is_featured' => (bool) $post->is_featured,
                    'author_name' => $post->author?->name ?? 'Editorial Team',
                ];
            })
            ->all();
    }

    public function savePost(int $postId, BlogAdminService $blogAdminService): void
    {
        $postIndex = collect($this->posts)->search(fn (array $post) => (int) $post['id'] === $postId);

        if ($postIndex === false) {
            return;
        }

        if (blank($this->posts[$postIndex]['slug'])) {
            $this->posts[$postIndex]['slug'] = Str::slug((string) $this->posts[$postIndex]['title']);
        }

        $this->validate([
            "posts.{$postIndex}.title" => ['required', 'string', 'max:255'],
            "posts.{$postIndex}.slug" => ['required', 'string', 'max:255', Rule::unique('blogs', 'slug')->ignore($postId)],
            "posts.{$postIndex}.content" => ['required', 'string'],
            "posts.{$postIndex}.category" => ['nullable', 'string', 'max:255'],
            "posts.{$postIndex}.featured_image" => ['nullable', 'string', 'max:2048'],
            "posts.{$postIndex}.is_featured" => ['boolean'],
        ]);

        $payload = $this->posts[$postIndex];
        $payload['category'] = trim((string) ($payload['category'] ?? ''));
        $payload['featured_image'] = trim((string) ($payload['featured_image'] ?? ''));
        $payload['category'] = $payload['category'] === '' ? null : $payload['category'];
        $payload['featured_image'] = $payload['featured_image'] === '' ? null : $payload['featured_image'];

        $blogAdminService->updatePost($postId, $payload);

        $this->savedPostId = $postId;
        $this->statusMessage = 'Data blog berhasil diperbarui.';
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.blog-editor');
    }
}