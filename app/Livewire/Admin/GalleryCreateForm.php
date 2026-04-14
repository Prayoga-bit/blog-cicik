<?php

namespace App\Livewire\Admin;

use App\Services\GalleryAdminService;
use Livewire\Component;

class GalleryCreateForm extends Component
{
    public bool $isUserView = false;

    public string $title = '';

    public ?string $description = null;

    public string $image_url = '';

    public string $statusMessage = '';

    public function mount(bool $isUserView = false): void
    {
        $this->isUserView = $isUserView;
    }

    public function save(GalleryAdminService $galleryAdminService): mixed
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:65535'],
            'image_url' => ['required', 'string', 'max:2048'],
        ]);

        $payload = [
            'title' => trim($this->title),
            'description' => $this->description !== null ? trim($this->description) : null,
            'image_url' => trim($this->image_url),
        ];

        $payload['description'] = $payload['description'] === '' ? null : $payload['description'];

        $gallery = $galleryAdminService->createItem($payload, (int) auth()->id());

        $routeName = $this->isUserView ? 'user.gallery-editor.edit' : 'gallery-editor.edit';

        return redirect()->route($routeName, $gallery->id)
            ->with('status', 'Gallery berhasil dibuat.');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.gallery-create-form');
    }
}
