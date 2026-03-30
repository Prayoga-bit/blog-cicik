{{-- Latest Insights Section --}}
<x-ui.section bg="white">
    <div class="flex justify-between items-end mb-12">
        <h2 class="font-bold text-brand-dark text-4xl">
            {{ $sections->get('insights_title')?->content ?? 'Latest Insights' }}
        </h2>
        <a href="{{ route('blog') }}" class="font-medium text-brand-green flex items-center gap-2 hover:underline">
            {{ $sections->get('insights_view_all_label')?->content ?? 'View All Posts' }}
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($latestPosts as $post)
            @php
                $postImage = $post->featured_image
                    ? (str_starts_with($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image))
                    : 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop';
            @endphp
            <x-ui.card
                :image="$postImage"
                :category="$post->author?->name ?? 'General'"
                :date="$post->created_at->format('F j, Y')"
                :title="$post->title"
                :description="\Illuminate\Support\Str::limit(strip_tags($post->content), 120)"
                :slug="route('blog.read', $post->slug)"
            />
        @empty
            {{-- Placeholder cards shown when no blog posts exist yet --}}
            <x-ui.card
                image="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop"
                category="Market Analysis"
                date="March 15, 2026"
                title="Understanding Market Volatility in 2026"
                description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
                :slug="route('blog')"
            />
            <x-ui.card
                image="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
                category="Investment Strategy"
                date="March 10, 2026"
                title="The Golden Rule of Asset Allocation"
                description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
                :slug="route('blog')"
            />
            <x-ui.card
                image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
                category="Business"
                date="March 5, 2026"
                title="Why Corporate Consulting Matters"
                description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
                :slug="route('blog')"
            />
        @endforelse
    </div>
</x-ui.section>
