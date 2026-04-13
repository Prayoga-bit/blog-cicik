<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Blog extends Model
{
    use HasRichText;

    protected static function booted(): void
    {
        static::creating(function (self $blog): void {
            if (! array_key_exists('content', $blog->attributes) || $blog->attributes['content'] === null) {
                $blog->attributes['content'] = '';
            }
        });
    }

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
        'featured_image',
        'is_featured',
        'author_id',
    ];

    protected $richTextAttributes = [
        'content',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
