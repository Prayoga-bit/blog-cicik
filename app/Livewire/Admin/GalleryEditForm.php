<?php

namespace App\Livewire\Admin;

use App\Models\Gallery;
use App\Services\GalleryAdminService;
use Livewire\Component;

class GalleryEditForm extends Component
{
    public Gallery $gallery;

    public bool $isUserView = false;

    public string $title = '';

    public ?string $description = null;

    public string $image_url = '';

    public string $statusMessage = '';

    public function mount(Gallery $gallery, bool $isUserView = false): void
    {
        $this->gallery = $gallery;
        $this->isUserView = $isUserView;
        $this->title = (string) $gallery->title;
        $this->description = $gallery->description;
        $this->image_url = (string) $gallery->image_url;
    }

    public function save(GalleryAdminService $galleryAdminService): void
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

        if ($this->isUserView) {
            $galleryAdminService->updateUserItem($this->gallery->id, (int) auth()->id(), $payload);
        } else {
            $galleryAdminService->updateItem($this->gallery->id, $payload);
        }

        $this->statusMessage = 'Data gallery berhasil diperbarui.';
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.gallery-edit-form');
    }
}
