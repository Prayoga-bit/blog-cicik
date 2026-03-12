<?php

namespace App\Services;

use App\Models\PageSection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PageContentService
{
    /**
     * Retrieve all sections for a given page, keyed by section_key.
     * Results are cached to avoid repeated database hits.
     */
    public function getSections(string $pageName): Collection
    {
        $cacheKey = "page_sections:{$pageName}";

        return Cache::rememberForever($cacheKey, function () use ($pageName) {
            return PageSection::where('page_name', $pageName)
                ->get()
                ->keyBy('section_key');
        });
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
        Cache::forget("page_sections:{$pageName}");
    }
}
