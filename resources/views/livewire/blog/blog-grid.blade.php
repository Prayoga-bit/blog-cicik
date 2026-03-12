<div class="w-full">
    {{-- Search Bar --}}
    <div class="flex justify-center mb-16">
        <div class="relative w-full max-w-md">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-brand-dark/50 text-lg"></i>
            <input 
                type="text" 
                wire:model.live.debounce.300ms="search"
                placeholder="Search articles..." 
                class="w-full pl-12 pr-6 py-3 px-12 rounded-full border border-gray-200 bg-white shadow-sm text-base text-brand-dark placeholder-brand-dark/50 focus:outline-none focus:ring-2 focus:ring-brand-green/20 focus:border-brand-green transition"
            />
        </div>
    </div>

    {{-- Blog Grid --}}
    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
            <i class="fa-regular fa-file-lines text-brand-muted/40 mb-4 text-6xl"></i>
            <p class="text-brand-muted text-lg">No articles found.</p>
            <p class="text-brand-muted/60 text-sm mt-1">Try adjusting your search terms.</p>
        </div>
    @endif

    {{-- Pagination --}}
    @if($lastPage > 1)
        <div class="flex items-center justify-center gap-2 mt-16">
            {{-- Previous --}}
            <button 
                wire:click="previousPage"
                @if($currentPage <= 1) disabled @endif
                class="w-8 h-8 rounded flex items-center justify-center border transition
                    {{ $currentPage <= 1 ? 'bg-gray-100 border-gray-200 text-gray-400 cursor-not-allowed opacity-50' : 'bg-white border-gray-200 text-brand-dark hover:bg-gray-50' }}"
            >
                <i class="fa-solid fa-chevron-left text-xs"></i>
            </button>

            {{-- Page Numbers --}}
            @php
                $pages = [];
                if ($lastPage <= 5) {
                    $pages = range(1, $lastPage);
                } else {
                    $pages[] = 1;
                    if ($currentPage > 3) $pages[] = '...';
                    for ($i = max(2, $currentPage - 1); $i <= min($lastPage - 1, $currentPage + 1); $i++) {
                        $pages[] = $i;
                    }
                    if ($currentPage < $lastPage - 2) $pages[] = '...';
                    $pages[] = $lastPage;
                }
            @endphp

            @foreach($pages as $page)
                @if($page === '...')
                    <span class="w-8 h-8 rounded flex items-center justify-center bg-white border border-gray-200 text-sm font-bold text-brand-green">...</span>
                @else
                    <button 
                        wire:click="gotoPage({{ $page }})"
                        class="w-8 h-8 rounded flex items-center justify-center text-sm font-bold transition
                            {{ $page == $currentPage 
                                ? 'bg-white border-2 border-brand-green text-brand-green' 
                                : 'bg-white border border-gray-200 text-brand-green hover:bg-gray-50' }}"
                    >
                        {{ $page }}
                    </button>
                @endif
            @endforeach

            {{-- Next --}}
            <button 
                wire:click="nextPage"
                @if($currentPage >= $lastPage) disabled @endif
                class="w-8 h-8 rounded flex items-center justify-center border transition
                    {{ $currentPage >= $lastPage ? 'bg-gray-100 border-gray-200 text-gray-400 cursor-not-allowed opacity-50' : 'bg-white border-gray-200 text-brand-dark hover:bg-gray-50' }}"
            >
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </button>
        </div>
    @endif
</div>
