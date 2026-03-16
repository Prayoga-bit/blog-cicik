<x-layouts.main>
    {{-- Background --}}
    <div class="bg-brand-light min-h-screen">

        {{-- Hero Section --}}
        <div class="w-full max-w-[1440px] mx-auto px-6 md:px-12 lg:px-24 pt-32 pb-8 text-center">
            <h1 class="font-['Italianno'] text-6xl md:text-7xl text-brand-dark mb-4">
                {{ $sections->get('blog_title')?->content ?? 'Our Journal' }}
            </h1>
            <p class="text-xl text-brand-gray">
                {{ $sections->get('blog_subtitle')?->content ?? 'Insights, strategies, and stories from our team of financial experts.' }}
            </p>
        </div>

        {{-- Blog Content --}}
        <div class="w-full max-w-[1200px] mx-auto px-6 md:px-12 lg:px-4 pb-24">
            <livewire:blog.blog-grid
                :searchPlaceholder="$sections->get('blog_search_placeholder')?->content ?? 'Search articles...'"
                :emptyTitle="$sections->get('blog_empty_title')?->content ?? 'No articles found.'"
                :emptySubtitle="$sections->get('blog_empty_subtitle')?->content ?? 'Try adjusting your search terms.'"
            />
        </div>
    </div>
</x-layouts.main>
