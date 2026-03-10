{{-- Practice Areas Section --}}
<x-ui.section bg="light">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-4xl text-brand-dark">Our Practice Areas</h2>
            <p class="font-normal text-brand-gray text-lg">Specialized financial services designed to maximize your potential.</p>
        </div>
        <x-ui.button variant="outline" href="#">
            View All Services
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </x-ui.button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-ui.expertise-card
            title="Gold Investment"
            description="Secure your future with tangible assets. We provide expert guidance on gold market trends and acquisition."
            image="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card
            title="Forex Trading"
            description="Navigate the global currency markets with our professional trading strategies and risk management tools."
            image="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card
            title="Risk Management"
            description="Comprehensive insurance and protection plans to safeguard your wealth against unforeseen circumstances."
            image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card
            title="Strategic Consulting"
            description="Tailored business and financial advice to help you reach your corporate and personal goals."
            image="https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
            </x-slot:icon>
        </x-ui.expertise-card>
    </div>
</x-ui.section>
