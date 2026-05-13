<?php

namespace App\Livewire\Admin;

use App\Models\Gallery;
use App\Services\GalleryAdminService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryEditForm extends Component
{
    use WithFileUploads;

    public Gallery $gallery;

    public bool $isUserView = false;

    public string $title = '';

    public ?string $description = null;

    public $image;

    public ?string $currentImageUrl = null;

    public string $statusMessage = '';

    public function mount(Gallery $gallery, bool $isUserView = false): void
    {
        $this->gallery = $gallery;
        $this->isUserView = $isUserView;
        $this->title = (string) $gallery->title;
        $this->description = $gallery->description;
        $this->currentImageUrl = (string) $gallery->image_url;
    }

    public function save(GalleryAdminService $galleryAdminService): void
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:65535'],
            'image' => [$this->currentImageUrl ? 'nullable' : 'required', 'image', 'max:5120'],
        ]);

        $imagePath = $this->currentImageUrl;
        if ($this->image) {
            if ($this->currentImageUrl && !str_starts_with($this->currentImageUrl, 'http') && Storage::disk('public')->exists($this->currentImageUrl)) {
                Storage::disk('public')->delete($this->currentImageUrl);
            }

            $imagePath = $this->image->store('gallery-images', 'public');
        }

        $payload = [
            'title' => trim($this->title),
            'description' => $this->description !== null ? trim($this->description) : null,
            'image_url' => $imagePath,
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
