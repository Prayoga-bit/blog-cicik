@props(['image', 'category', 'date', 'title', 'description', 'author', 'slug' => '#'])

<a href="{{ $slug }}" class="group block h-full">
    <article class="flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-sm hover:shadow-md transition-shadow duration-300">
        {{-- Image --}}
        <div class="relative block w-full h-64 overflow-hidden">
            <img 
                alt="{{ $title }}" 
                loading="lazy" 
                class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" 
                src="{{ $image }}" 
            />
            <div class="absolute inset-0 bg-black/10"></div>
        </div>

        {{-- Content --}}
        <div class="flex flex-1 flex-col gap-4 p-6">
            {{-- Category & Date --}}
            <div class="flex items-center gap-4">
                @if($category)
                <span class="bg-brand-yellow rounded-full px-3 py-1 font-medium text-brand-dark text-xs">
                    {{ $category }}
                </span>
                @endif
                @if($date)
                <span class="flex items-center gap-1.5 text-sm text-brand-muted">
                    <i class="fa-regular fa-calendar"></i>
                    {{ $date }}
                </span>
                @endif
            </div>

            {{-- Title --}}
            <h3 class="font-bold text-brand-dark text-xl leading-7 line-clamp-2">
                {{ $title }}
            </h3>

            {{-- Description --}}
            <p class="text-brand-gray text-base leading-6 line-clamp-3">
                {{ $description }}
            </p>

            {{-- Footer: Author & Read More --}}
            <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-user text-brand-muted text-sm"></i>
                    <span class="text-sm text-brand-muted">{{ $author }}</span>
                </div>
                <span class="flex items-center gap-1.5 text-sm font-medium text-brand-green group-hover:underline">
                    Read More
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </span>
            </div>
        </div>
    </article>
</a>
