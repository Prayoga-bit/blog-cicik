@props(['image', 'category', 'date', 'title', 'description', 'slug' => '#'])

<a href="{{ $slug }}" class="group block h-full">
    <article class="flex h-full w-full flex-col items-start overflow-clip rounded-2xl bg-white shadow-md transition-shadow hover:shadow-lg">
        <div class="relative h-64 w-full shrink-0 overflow-hidden">
            <img alt="{{ $title }}" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ $image }}" />
        </div>

        <div class="flex w-full flex-col gap-4 p-6">
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
</a>