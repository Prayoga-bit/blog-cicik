{{-- Latest Insights Section --}}
<x-ui.section bg="white">
    <div class="flex justify-between items-end mb-12">
        <h2 class="font-bold text-brand-dark text-4xl">Latest Insights</h2>
        <a href="#" class="font-medium text-brand-green flex items-center gap-2 hover:underline">
            View All Posts
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <x-ui.card
            image="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop"
            category="Market Analysis"
            date="March 15, 2026"
            title="Understanding Market Volatility in 2026"
            description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
        />
        <x-ui.card
            image="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
            category="Investment Strategy"
            date="March 10, 2026"
            title="The Golden Rule of Asset Allocation"
            description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
        />
        <x-ui.card
            image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
            category="Business"
            date="March 5, 2026"
            title="Why Corporate Consulting Matters"
            description="Discover the latest trends and strategies that can help elevate your financial portfolio to the next level."
        />
    </div>
</x-ui.section>
