<?php

namespace App\Livewire\Admin;

use App\Services\PageContentService;
use Livewire\Component;

class PageSectionEditor extends Component
{
    public array $pages = [];

    public ?string $savedPage = null;

    public string $statusMessage = '';

    public function mount(PageContentService $cms): void
    {
        $this->pages = $cms->getEditableSections()
            ->map(function ($sections, string $pageName): array {
                return [
                    'page_name' => $pageName,
                    'sections' => $sections
                        ->values()
                        ->map(function ($section): array {
                            return [
                                'id' => $section->id,
                                'section_key' => $section->section_key,
                                'content' => $section->content,
                                'image_url' => $section->image_url,
                            ];
                        })
                        ->all(),
                ];
            })
            ->all();
    }

    public function savePage(string $pageName, PageContentService $cms): void
    {
        $this->validate([
            "pages.{$pageName}.sections" => ['required', 'array', 'min:1'],
            "pages.{$pageName}.sections.*.content" => ['nullable', 'string', 'max:65535'],
            "pages.{$pageName}.sections.*.image_url" => ['nullable', 'string', 'max:2048'],
        ]);

        foreach ($this->pages[$pageName]['sections'] as $section) {
            $imageUrl = isset($section['image_url']) ? trim((string) $section['image_url']) : '';

            $cms->updateSectionContentAndImage(
                $pageName,
                $section['section_key'],
                $section['content'] ?? null,
                $imageUrl === '' ? null : $imageUrl,
            );
        }

        $this->savedPage = $pageName;
        $this->statusMessage = 'Konten halaman berhasil diperbarui.';
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.page-section-editor');
    }
}