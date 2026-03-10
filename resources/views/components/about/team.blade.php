{{-- Meet The Team Section --}}
<x-ui.section bg="white">
    {{-- Header --}}
    <div class="flex flex-col items-center gap-4 mb-16 text-center">
        <span class="text-brand-green text-sm font-bold tracking-widest uppercase">Meet The Team</span>
        <h2 class="font-cursive text-5xl md:text-6xl text-brand-dark">The Experts Behind Your Success</h2>
        <p class="text-brand-gray text-lg max-w-xl mt-2">
            Our team of experienced professionals brings diverse expertise and a shared passion for helping clients achieve financial success.
        </p>
    </div>

    {{-- Team Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <x-about.team-card
            name="James Anderson"
            position="CEO & Founder"
            image="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=400&auto=format&fit=crop"
        />
        <x-about.team-card
            name="Sarah Mitchell"
            position="Head of Strategy"
            image="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400&auto=format&fit=crop"
        />
        <x-about.team-card
            name="Michael Chen"
            position="Senior Analyst"
            image="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop"
        />
        <x-about.team-card
            name="Emily Rodriguez"
            position="Risk Manager"
            image="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=400&auto=format&fit=crop"
        />
    </div>
</x-ui.section>
