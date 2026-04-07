<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use App\Services\BlogAdminService;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BlogEditForm extends Component
{
    public Blog $blog;

    public string $title = '';
    public string $slug = '';
    public string $content = '';
    public ?string $category = null;
    public ?string $featured_image = null;
    public bool $is_featured = false;

    public string $statusMessage = '';

    public function mount(Blog $blog): void
    {
        $this->blog = $blog;
        $this->title = (string) $blog->title;
        $this->slug = (string) $blog->slug;
        $this->content = (string) $blog->content;
        $this->category = $blog->category;
        $this->featured_image = $blog->featured_image;
        $this->is_featured = (bool) $blog->is_featured;
    }

    public function save(BlogAdminService $blogAdminService): void
    {
        if (blank($this->slug)) {
            $this->slug = Str::slug($this->title);
        }

        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('blogs', 'slug')->ignore($this->blog->id)],
            'content' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:255'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
            'is_featured' => ['boolean'],
        ]);

        $payload = [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'category' => $this->category !== null ? trim($this->category) : null,
            'featured_image' => $this->featured_image !== null ? trim($this->featured_image) : null,
            'is_featured' => $this->is_featured,
        ];

        $payload['category'] = $payload['category'] === '' ? null : $payload['category'];
        $payload['featured_image'] = $payload['featured_image'] === '' ? null : $payload['featured_image'];

        $blogAdminService->updatePost($this->blog->id, $payload);

        $this->statusMessage = 'Data blog berhasil diperbarui.';
    }

    public function render()
    {
        return view('livewire.admin.blog-edit-form');
    }
}
