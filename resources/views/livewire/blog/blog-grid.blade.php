<div class="relative w-full rounded-[32px] bg-brand-light/70 p-6 shadow-sm ring-1 ring-brand-green/5 sm:p-8">
    {{-- Search Bar --}}
    <div class="mb-14 flex justify-center">
        <div class="relative w-full max-w-md">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-brand-dark/50 text-lg"></i>
            <input 
                type="text" 
                wire:model.live.debounce.300ms="search"
                placeholder="{{ $searchPlaceholder }}"
                class="w-full pl-12 pr-6 py-3 px-12 rounded-full border border-gray-200 bg-white shadow-sm text-base text-brand-dark placeholder-brand-dark/50 focus:outline-none focus:ring-2 focus:ring-brand-green/20 focus:border-brand-green transition"
            />
        </div>
    </div>

    {{-- Blog Grid --}}
    @if($posts->count() > 0)
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <x-ui.blog-card 
                    :image="$post['image']"
                    :category="$post['category']"
                    :date="$post['date']"
                    :title="$post['title']"
                    :description="$post['description']"
                    :author="$post['author']"
                    :slug="$post['slug'] ?? '#'"
                />
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center justify-center py-20 text-center">
            <i class="fa-regular fa-file-lines mb-4 text-6xl text-brand-muted/40"></i>
            <p class="text-lg text-brand-muted">{{ $emptyTitle }}</p>
            <p class="mt-1 text-sm text-brand-muted/60">{{ $emptySubtitle }}</p>
        </div>
    @endif

    <x-ui.pagination :paginator="$posts" />
</div>
