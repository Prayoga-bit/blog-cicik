<?php

namespace App\Services;

use App\Models\ProjectArea;
use Illuminate\Support\Collection;

class ProjectAreaService
{
    /**
     * Retrieve all project areas for the admin editor.
     */
    public function getEditableAreas(): Collection
    {
        return ProjectArea::query()
            ->latest('id')
            ->get();
    }

    /**
     * Update a project area's editable fields.
     */
    public function updateArea(int $areaId, array $payload): ProjectArea
    {
        $area = ProjectArea::query()->findOrFail($areaId);

        $area->update([
            'title' => $payload['title'] ?? $area->title,
            'description' => $payload['description'] ?? $area->description,
            'icon_url' => $payload['icon_url'] ?? null,
            'image_url' => $payload['image_url'] ?? null,
        ]);

        return $area;
    }
}