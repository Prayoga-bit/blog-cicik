<?php

namespace App\Livewire\Admin;

use App\Services\PageContentService;
use Livewire\Component;

class PageSectionEditor extends Component
{
    public array $pageNames = [];

    public string $selectedPage = '';

    public array $sections = [];

    public ?string $savedPage = null;

    public string $statusMessage = '';

    public function mount(PageContentService $cms): void
    {
        $this->pageNames = $cms->getPageNames()->values()->all();

        if ($this->pageNames === []) {
            return;
        }

        $this->selectedPage = $this->pageNames[0];
        $this->loadSelectedPageSections($cms);
    }

    public function selectPage(string $pageName, PageContentService $cms): void
    {
        if (! in_array($pageName, $this->pageNames, true)) {
            return;
        }

        $this->selectedPage = $pageName;
        $this->savedPage = null;
        $this->statusMessage = '';
        $this->loadSelectedPageSections($cms);
    }

    public function savePage(PageContentService $cms): void
    {
        if ($this->selectedPage === '') {
            return;
        }

        $this->validate([
            'sections' => ['required', 'array', 'min:1'],
            'sections.*.content' => ['nullable', 'string', 'max:65535'],
            'sections.*.image_url' => ['nullable', 'string', 'max:2048'],
        ]);

        foreach ($this->sections as $section) {
            $imageUrl = isset($section['image_url']) ? trim((string) $section['image_url']) : '';

            $cms->updateSectionContentAndImage(
                $this->selectedPage,
                $section['section_key'],
                $section['content'] ?? null,
                $imageUrl === '' ? null : $imageUrl,
            );
        }

        $this->savedPage = $this->selectedPage;
        $this->statusMessage = 'Konten halaman berhasil diperbarui.';
    }

    private function loadSelectedPageSections(PageContentService $cms): void
    {
        if ($this->selectedPage === '') {
            $this->sections = [];

            return;
        }

        $this->sections = $cms->getEditableSections()
            ->get($this->selectedPage, collect())
            ->values()
            ->map(function ($section): array {
                return [
                    'id' => $section->id,
                    'section_key' => $section->section_key,
                    'content' => $section->content,
                    'image_url' => $section->image_url,
                ];
            })
            ->all();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.page-section-editor');
    }
}