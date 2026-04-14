<?php

namespace App\Livewire\Admin;

use App\Services\BlogAdminService;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BlogCreateForm extends Component
{
    public bool $isUserView = false;

    public string $title = '';

    public string $slug = '';

    public string $content = '';

    public ?string $category = null;

    public ?string $featured_image = null;

    public bool $is_featured = false;

    public function mount(bool $isUserView = false): void
    {
        $this->isUserView = $isUserView;
    }

    public function save(BlogAdminService $blogAdminService): mixed
    {
        if (blank($this->slug)) {
            $this->slug = Str::slug($this->title);
        }

        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('blogs', 'slug')],
            'content' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:255'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
            'is_featured' => ['boolean'],
        ]);

        $payload = [
            'title' => trim($this->title),
            'slug' => trim($this->slug),
            'content' => $this->content,
            'category' => $this->category !== null ? trim($this->category) : null,
            'featured_image' => $this->featured_image !== null ? trim($this->featured_image) : null,
            'is_featured' => $this->is_featured,
        ];

        $payload['category'] = $payload['category'] === '' ? null : $payload['category'];
        $payload['featured_image'] = $payload['featured_image'] === '' ? null : $payload['featured_image'];

        $blog = $blogAdminService->createPost($payload, (int) auth()->id());

        $routeName = $this->isUserView ? 'user.blog-editor.edit' : 'blog-editor.edit';

        return redirect()->route($routeName, $blog->id)
            ->with('status', 'Blog berhasil dibuat.');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.blog-create-form');
    }
}
