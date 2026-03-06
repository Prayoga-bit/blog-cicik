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
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
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