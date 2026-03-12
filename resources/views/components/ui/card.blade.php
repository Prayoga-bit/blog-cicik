@props(['image', 'category', 'date', 'title', 'description'])

<article class="flex flex-col items-start overflow-clip rounded-2xl w-full h-full shadow-md bg-white hover:shadow-lg transition-shadow">
    <div class="relative w-full h-64 shrink-0">
        <img alt="{{ $title }}" loading="lazy" class="absolute inset-0 object-cover w-full h-full" src="{{ $image }}" />
    </div>
    
    <div class="flex flex-col p-6 w-full gap-4">
        @if($category || $date)
        <div class="flex items-center gap-4">
            @if($category)
            <span class="bg-brand-yellow rounded-full px-3 py-1 font-medium text-brand-dark text-xs">
                {{ $category }}
            </span>
            @endif
            @if($date)
            <span class="flex items-center gap-1 text-sm text-brand-muted">
                <i class="fa-regular fa-calendar"></i>
                {{ $date }}
            </span>
            @endif
        </div>
        @endif
        
        <h3 class="font-bold text-brand-dark text-xl leading-7">
            {{ $title }}
        </h3>
        
        <p class="font-normal text-brand-gray text-base leading-6 line-clamp-2">
            {{ $description }}
        </p>
    </div>
</article>