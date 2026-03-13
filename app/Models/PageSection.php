<?php

namespace App\Models;

use App\Services\PageContentService;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = [
        'page_name',
        'section_key',
        'content',
        'image_url',
    ];

    protected static function booted(): void
    {
        static::saved(function (PageSection $section): void {
            app(PageContentService::class)->clearCache($section->page_name);
        });

        static::deleted(function (PageSection $section): void {
            app(PageContentService::class)->clearCache($section->page_name);
        });
    }
}
