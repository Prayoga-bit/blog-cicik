<?php

namespace App\Services;

use App\Models\PageSection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PageContentService
{
    private const CACHE_TTL_SECONDS = 10;

    /**
     * Retrieve all sections for a given page, keyed by section_key.
     * Results are cached to avoid repeated database hits.
     */
    public function getSections(string $pageName): Collection
    {
        $meta = PageSection::query()
            ->where('page_name', $pageName)
            ->selectRaw('MAX(updated_at) as latest_updated_at, COUNT(*) as total')
            ->first();

        $latestUpdatedAtRaw = $meta?->latest_updated_at;
        $latestUpdatedAt = match (true) {
            $latestUpdatedAtRaw instanceof \DateTimeInterface => $latestUpdatedAtRaw->getTimestamp(),
            is_string($latestUpdatedAtRaw) => strtotime($latestUpdatedAtRaw) ?: 0,
            default => 0,
        };
        $total = (int) ($meta?->total ?? 0);
        $nonce = (int) Cache::get($this->nonceKey($pageName), 0);

        $cacheKey = "page_sections:{$pageName}:{$nonce}:{$latestUpdatedAt}:{$total}";

        return Cache::remember($cacheKey, now()->addSeconds(self::CACHE_TTL_SECONDS), function () use ($pageName) {
            return PageSection::where('page_name', $pageName)
                ->get()
                ->keyBy('section_key');
        });
    }

    /**
     * Retrieve all sections for the admin page, grouped by page name.
     */
    public function getEditableSections(): Collection
    {
        return PageSection::query()
            ->orderBy('page_name')
            ->orderBy('section_key')
            ->get()
            ->groupBy('page_name');
    }

    /**
     * Get the available page names that contain editable sections.
     */
    public function getPageNames(): Collection
    {
        return PageSection::query()
            ->select('page_name')
            ->distinct()
            ->orderBy('page_name')
            ->pluck('page_name');
    }

    /**
     * Get the text content for a specific section key, with an optional fallback.
     */
    public function getText(string $pageName, string $sectionKey, string $fallback = ''): string
    {
        $sections = $this->getSections($pageName);

        return $sections->get($sectionKey)?->content ?? $fallback;
    }

    /**
     * Update or create a text section for the given page.
     */
    public function updateSectionContent(string $pageName, string $sectionKey, ?string $content): PageSection
    {
        return PageSection::updateOrCreate(
            ['page_name' => $pageName, 'section_key' => $sectionKey],
            ['content' => $content]
        );
    }

    /**
     * Update or create a section's text and image URL for the given page.
     */
    public function updateSectionContentAndImage(
        string $pageName,
        string $sectionKey,
        ?string $content,
        ?string $imageUrl,
    ): PageSection {
        return PageSection::updateOrCreate(
            ['page_name' => $pageName, 'section_key' => $sectionKey],
            [
                'content' => $content,
                'image_url' => $imageUrl,
            ]
        );
    }

    /**
     * Get the image URL for a specific section key, with an optional fallback.
     * Returns a full asset URL using the storage symlink.
     */
    public function getImage(string $pageName, string $sectionKey, string $fallback = ''): string
    {
        $sections = $this->getSections($pageName);
        $imageUrl = $sections->get($sectionKey)?->image_url ?? '';

        if ($imageUrl === '') {
            return $fallback;
        }

        // If it's already an absolute URL (e.g. http/https), return as-is
        if (str_starts_with($imageUrl, 'http')) {
            return $imageUrl;
        }

        return asset('storage/' . $imageUrl);
    }

    /**
     * Clear the cached sections for a specific page.
     * Call this whenever a page section is updated through the CMS.
     */
    public function clearCache(string $pageName): void
    {
        $nonceKey = $this->nonceKey($pageName);
        $current = (int) Cache::get($nonceKey, 0);

        Cache::forever($nonceKey, $current + 1);
    }

    private function nonceKey(string $pageName): string
    {
        return "page_sections_nonce:{$pageName}";
    }
}
