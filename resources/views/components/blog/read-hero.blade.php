@props(['blog'])

@php
    $imageUrl = $blog->featured_image
        ? (str_starts_with($blog->featured_image, 'http') ? $blog->featured_image : asset('storage/' . $blog->featured_image))
        : 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&q=80&w=1600';

    $wordCount = str_word_count(strip_tags((string) $blog->content));
    $readMinutes = max(1, (int) ceil($wordCount / 200));
@endphp

<section class="relative h-[520px] md:h-[450px] overflow-hidden">
    <img
        src="{{ $imageUrl }}"
        alt="{{ $blog->title }}"
        class="absolute inset-0 h-full w-full object-cover"
    />

    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/45 to-black/25"></div>

    <div class="relative mx-auto flex h-full w-full max-w-[1200px] items-center justify-center px-6 pt-24 text-center md:px-12">
        <div class="max-w-5xl">
            <span class="inline-flex items-center gap-2 rounded-full bg-brand-yellow px-5 py-2 text-sm font-medium text-brand-dark shadow-lg">
                <i class="fa-solid fa-tag text-xs"></i>
                {{ $blog->category ?? 'Market Analysis' }}
            </span>

            <h1 class="mt-6 font-cursive text-5xl leading-tight text-white md:text-7xl">
                {{ $blog->title }}
            </h1>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-2 text-sm text-white backdrop-blur-sm">
                    <i class="fa-regular fa-user"></i>
                    {{ $blog->author?->name ?? 'Editorial Team' }}
                </span>
                <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-2 text-sm text-white backdrop-blur-sm">
                    <i class="fa-regular fa-calendar"></i>
                    {{ $blog->created_at?->format('F j, Y') ?? now()->format('F j, Y') }}
                </span>
                <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-2 text-sm text-white backdrop-blur-sm">
                    <i class="fa-regular fa-clock"></i>
                    {{ $readMinutes }} min read
                </span>
            </div>
        </div>
    </div>
</section>
