{{-- Home Hero Section --}}
@php
    $heroBackground = $sections->get('hero_background_image');
    $heroBackgroundSrc = $heroBackground?->image_url
        ? (str_starts_with($heroBackground->image_url, 'http') ? $heroBackground->image_url : asset('storage/' . $heroBackground->image_url))
        : null;
@endphp

<section class="relative w-full min-h-screen flex items-center justify-start bg-brand-dark pt-20 px-6 md:px-12 lg:px-24 overflow-hidden">
    @if ($heroBackgroundSrc)
        <img
            alt="{{ $heroBackground?->content ?? 'Hero background' }}"
            loading="lazy"
            class="absolute inset-0 z-0 h-full w-full object-cover opacity-25"
            src="{{ $heroBackgroundSrc }}"
        />
    @endif

    <div class="absolute inset-0 z-0"></div>

    {{-- Abstract background graphics --}}
    <div class="absolute inset-0 z-0 opacity-5">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-brand-green blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-brand-yellow/20 blur-[150px] rounded-full"></div>
    </div>

    <div class="relative z-10 max-w-[700px] flex flex-col gap-6 mt-16 md:mt-0">
        <h1 class="font-bold text-5xl md:text-6xl text-white leading-tight">
            {{ $sections->get('hero_title')?->content ?? 'Smart Strategies for Managing Your Futures Assets' }}
        </h1>
        <p class="font-medium text-xl text-white/90 leading-relaxed max-w-[550px]">
            {{ $sections->get('hero_subtitle')?->content ?? 'Professional assistance for managing gold, forex, and other trading instruments' }}
        </p>
        <div class="mt-6 flex">
            <a href="#explore" class="bg-brand-green group flex items-center gap-3 px-6 py-4 rounded-full font-medium text-white text-lg hover:bg-green-800 transition-colors">
                {{ $sections->get('hero_button_label')?->content ?? 'Explore More' }}
                <span class="bg-brand-yellow text-brand-dark w-8 h-8 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-arrow-right text-sm"></i>
                </span>
            </a>
        </div>
    </div>
</section>
