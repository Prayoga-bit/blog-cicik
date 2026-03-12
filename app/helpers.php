<?php

use App\Services\PageContentService;

if (! function_exists('page_text')) {
    /**
     * Get the text content for a CMS page section.
     */
    function page_text(string $pageName, string $sectionKey, string $fallback = ''): string
    {
        return app(PageContentService::class)->getText($pageName, $sectionKey, $fallback);
    }
}

if (! function_exists('page_image')) {
    /**
     * Get the image asset URL for a CMS page section.
     */
    function page_image(string $pageName, string $sectionKey, string $fallback = ''): string
    {
        return app(PageContentService::class)->getImage($pageName, $sectionKey, $fallback);
    }
}
