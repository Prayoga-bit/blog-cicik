<?php

namespace App\Livewire\Admin;

use App\Services\ProjectAreaService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectAreaEditor extends Component
{
    use WithFileUploads;

    public array $areas = [];

    public array $areaImages = [];

    public ?int $savedAreaId = null;

    public string $statusMessage = '';

    public function mount(ProjectAreaService $projectAreaService): void
    {
        $this->areas = $projectAreaService->getEditableAreas()
            ->map(function ($area): array {
                return [
                    'id' => $area->id,
                    'title' => $area->title,
                    'description' => $area->description,
                    'icon_url' => $area->icon_url,
                    'image_url' => $area->image_url,
                ];
            })
            ->all();
    }

    public function saveArea(int $areaId, ProjectAreaService $projectAreaService): void
    {
        $areaIndex = collect($this->areas)->search(fn (array $area) => (int) $area['id'] === $areaId);

        if ($areaIndex === false) {
            return;
        }

        $this->validate([
            "areas.{$areaIndex}.title" => ['required', 'string', 'max:255'],
            "areas.{$areaIndex}.description" => ['required', 'string', 'max:65535'],
            "areas.{$areaIndex}.icon_url" => ['nullable', 'string', 'max:255'],
            "areaImages.{$areaIndex}" => ['nullable', 'image', 'max:5120'],
        ]);

        $payload = $this->areas[$areaIndex];
        $payload['icon_url'] = trim((string) ($payload['icon_url'] ?? ''));
        $payload['icon_url'] = $payload['icon_url'] === '' ? null : $payload['icon_url'];

        if (($this->areaImages[$areaIndex] ?? null) !== null) {
            $currentImage = $payload['image_url'] ?? null;

            if ($currentImage && ! str_starts_with($currentImage, 'http') && Storage::disk('public')->exists($currentImage)) {
                Storage::disk('public')->delete($currentImage);
            }

            $payload['image_url'] = $this->areaImages[$areaIndex]->store('project-area-images', 'public');
            $this->areas[$areaIndex]['image_url'] = $payload['image_url'];
            $this->areaImages[$areaIndex] = null;
        }

        $projectAreaService->updateArea($areaId, $payload);

        $this->savedAreaId = $areaId;
        $this->statusMessage = 'Data project area berhasil diperbarui.';
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.project-area-editor');
    }
}