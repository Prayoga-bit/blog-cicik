@props(['paginator'])

@if ($paginator->lastPage() > 1)
    <div class="mt-14 flex items-center justify-center gap-3">
        <button
            type="button"
            wire:click="previousPage"
            wire:loading.attr="disabled"
            wire:target="previousPage,nextPage,gotoPage"
            @if ($paginator->currentPage() <= 1) disabled @endif
            class="flex h-10 w-10 items-center justify-center rounded-full border text-brand-dark shadow-sm transition-all duration-200
                {{ $paginator->currentPage() <= 1 ? 'cursor-not-allowed border-gray-200 bg-gray-100 text-gray-400 opacity-50' : 'border-brand-green/10 bg-white hover:-translate-y-0.5 hover:border-brand-green hover:bg-brand-light' }}"
        >
            <i class="fa-solid fa-chevron-left text-xs"></i>
        </button>

        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $pages = [];

            if ($lastPage <= 5) {
                $pages = range(1, $lastPage);
            } else {
                $pages[] = 1;

                if ($currentPage > 3) {
                    $pages[] = '...';
                }

                for ($i = max(2, $currentPage - 1); $i <= min($lastPage - 1, $currentPage + 1); $i++) {
                    $pages[] = $i;
                }

                if ($currentPage < $lastPage - 2) {
                    $pages[] = '...';
                }

                $pages[] = $lastPage;
            }
        @endphp

        @foreach ($pages as $page)
            @if ($page === '...')
                <span class="flex h-10 w-10 items-center justify-center rounded-full border border-brand-green/10 bg-white text-sm font-bold text-brand-muted shadow-sm">...</span>
            @else
                <button
                    type="button"
                    wire:click="gotoPage({{ $page }})"
                    wire:loading.attr="disabled"
                    wire:target="previousPage,nextPage,gotoPage"
                    class="flex h-10 w-10 items-center justify-center rounded-full text-sm font-bold shadow-sm transition-all duration-200
                        {{ $page == $currentPage ? 'border-2 border-brand-yellow bg-brand-yellow text-brand-dark' : 'border border-brand-green/10 bg-white text-brand-green hover:-translate-y-0.5 hover:border-brand-green hover:bg-brand-light' }}"
                >
                    {{ $page }}
                </button>
            @endif
        @endforeach

        <button
            type="button"
            wire:click="nextPage"
            wire:loading.attr="disabled"
            wire:target="previousPage,nextPage,gotoPage"
            @if ($paginator->currentPage() >= $paginator->lastPage()) disabled @endif
            class="flex h-10 w-10 items-center justify-center rounded-full border text-brand-dark shadow-sm transition-all duration-200
                {{ $paginator->currentPage() >= $paginator->lastPage() ? 'cursor-not-allowed border-gray-200 bg-gray-100 text-gray-400 opacity-50' : 'border-brand-green/10 bg-white hover:-translate-y-0.5 hover:border-brand-green hover:bg-brand-light' }}"
        >
            <i class="fa-solid fa-chevron-right text-xs"></i>
        </button>
    </div>
@endif