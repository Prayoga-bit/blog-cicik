<?php

namespace App\Livewire\Admin;

use App\Services\GalleryAdminService;
use Livewire\Component;

class GalleryEditor extends Component
{
    public array $items = [];

    public ?int $savedItemId = null;

    public string $statusMessage = '';

    public function mount(GalleryAdminService $galleryAdminService): void
    {
        $this->items = $galleryAdminService->getEditableItems()
            ->map(function ($item): array {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'image_url' => $item->image_url,
                    'author_name' => $item->user?->name ?? 'Gallery Team',
                ];
            })
            ->all();
    }

    public function saveItem(int $itemId, GalleryAdminService $galleryAdminService): void
    {
        $itemIndex = collect($this->items)->search(fn (array $item) => (int) $item['id'] === $itemId);

        if ($itemIndex === false) {
            return;
        }

        $this->validate([
            "items.{$itemIndex}.title" => ['required', 'string', 'max:255'],
            "items.{$itemIndex}.description" => ['nullable', 'string', 'max:65535'],
            "items.{$itemIndex}.image_url" => ['required', 'string', 'max:2048'],
        ]);

        $payload = $this->items[$itemIndex];
        $payload['image_url'] = trim((string) $payload['image_url']);

        $galleryAdminService->updateItem($itemId, $payload);

        $this->savedItemId = $itemId;
        $this->statusMessage = 'Data gallery berhasil diperbarui.';
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.gallery-editor');
    }
}