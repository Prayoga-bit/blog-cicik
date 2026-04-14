<?php

namespace App\Livewire\Admin;

use App\Services\GalleryAdminService;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryEditor extends Component
{
    use WithPagination;

    public bool $userOnly = false;

    public string $statusMessage = '';

    public ?int $deletedItemId = null;

    protected string $paginationTheme = 'tailwind';

    public function mount(bool $userOnly = false): void
    {
        $this->userOnly = $userOnly;
    }

    public function deleteItem(int $itemId, GalleryAdminService $galleryAdminService): void
    {
        if ($this->userOnly) {
            $galleryAdminService->deleteUserItem($itemId, (int) auth()->id());
        } else {
            $galleryAdminService->deleteItem($itemId);
        }

        $this->deletedItemId = $itemId;
        $this->statusMessage = 'Data gallery berhasil dihapus.';

        $this->resetPage();
    }

    public function render(): \Illuminate\View\View
    {
        $service = app(GalleryAdminService::class);

        $items = $this->userOnly
            ? $service->getUserEditableItems((int) auth()->id(), 12)
            : $service->getEditableItems(12);

        $items->setCollection($items->getCollection()->map(function ($item): array {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'image_url' => $item->image_url,
                'author_name' => $item->user?->name ?? 'Gallery Team',
                'created_at' => optional($item->created_at)->format('M d, Y'),
                'description_excerpt' => Str::limit(strip_tags((string) $item->description), 130),
            ];
        }));

        return view('livewire.admin.gallery-editor', [
            'items' => $items,
            'isUserView' => $this->userOnly,
        ]);
    }
}