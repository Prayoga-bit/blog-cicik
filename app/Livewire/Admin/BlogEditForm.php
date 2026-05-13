<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use App\Services\BlogAdminService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogEditForm extends Component
{
    use WithFileUploads;

    public Blog $blog;

    public bool $isUserView = false;

    public string $title = '';
    public string $slug = '';
    public string $content = '';
    public ?string $category = null;
    public $featuredImage;
    public ?string $currentFeaturedImage = null;
    public bool $is_featured = false;

    public string $statusMessage = '';

    public function mount(Blog $blog, bool $isUserView = false): void
    {
        $this->blog = $blog;
        $this->isUserView = $isUserView;
        $this->title = (string) $blog->title;
        $this->slug = (string) $blog->slug;
        $this->content = $blog->content?->toEditorHtml() ?? '';
        $this->category = $blog->category;
        $this->currentFeaturedImage = $blog->featured_image;
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
            'featuredImage' => ['nullable', 'image', 'max:5120'],
            'is_featured' => ['boolean'],
        ]);

        $imagePath = $this->currentFeaturedImage;
        if ($this->featuredImage) {
            if ($this->currentFeaturedImage && !str_starts_with($this->currentFeaturedImage, 'http') && Storage::disk('public')->exists($this->currentFeaturedImage)) {
                Storage::disk('public')->delete($this->currentFeaturedImage);
            }

            $imagePath = $this->featuredImage->store('blog-images', 'public');
        }

        $payload = [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'category' => $this->category !== null ? trim($this->category) : null,
            'featured_image' => $imagePath,
            'is_featured' => $this->is_featured,
        ];

        $payload['category'] = $payload['category'] === '' ? null : $payload['category'];

        if ($this->isUserView) {
            $blogAdminService->updateUserPost($this->blog->id, (int) auth()->id(), $payload);
        } else {
            $blogAdminService->updatePost($this->blog->id, $payload);
        }

        $this->statusMessage = 'Data blog berhasil diperbarui.';
    }

    public function render()
    {
        return view('livewire.admin.blog-edit-form');
    }
}
