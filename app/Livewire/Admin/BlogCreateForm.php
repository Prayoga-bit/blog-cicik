<?php

namespace App\Livewire\Admin;

use App\Services\BlogAdminService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithFileUploads;

class BlogCreateForm extends Component
{
    use WithFileUploads;

    use WithFileUploads;

    public bool $isUserView = false;

    public string $title = '';

    public string $slug = '';

    public string $content = '';

    public ?string $category = null;

    public $featuredImage;

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
            'featuredImage' => ['nullable', 'image', 'max:5120'],
            'is_featured' => ['boolean'],
        ]);

        $imagePath = $this->featuredImage?->store('blog-images', 'public');

        $payload = [
            'title' => trim($this->title),
            'slug' => trim($this->slug),
            'content' => $this->content,
            'category' => $this->category !== null ? trim($this->category) : null,
            'featured_image' => $imagePath,
            'featured_image' => $imagePath,
            'is_featured' => $this->is_featured,
        ];

        $payload['category'] = $payload['category'] === '' ? null : $payload['category'];

        $blog = $blogAdminService->createPost($payload, (int) Auth::id());

        $routeName = $this->isUserView ? 'user.blog-editor.edit' : 'blog-editor.edit';

        return redirect()->route($routeName, $blog->id)
            ->with('status', 'Blog berhasil dibuat.');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.blog-create-form');
    }
}
