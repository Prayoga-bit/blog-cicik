{{-- Our Expertise Section --}}
<x-ui.section bg="light">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
        <div class="flex flex-col gap-3">
            <span class="text-brand-green text-sm font-bold tracking-widest uppercase">Project Areas</span>
            <h2 class="font-bold text-4xl md:text-5xl text-brand-dark">Our Expertise</h2>
        </div>
        <p class="text-brand-gray text-lg max-w-md">
            We specialize in diverse financial sectors to ensure your portfolio is robust and resilient.
        </p>
    </div>

    {{-- Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-ui.expertise-card variant="gradient"
            title="Gold Investment"
            description="Secure your wealth with tangible gold assets. Our expertise ensures maximum returns and portfolio stability through strategic precious metal investments."
            image="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-brand-dark" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card variant="gradient"
            title="Forex Trading"
            description="Navigate the global currency markets with professional guidance and cutting-edge trading strategies for consistent growth."
            image="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-brand-dark" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card variant="gradient"
            title="Risk Management"
            description="Comprehensive risk assessment and mitigation strategies to protect your assets and ensure long-term financial stability."
            image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-brand-dark" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card variant="gradient"
            title="Strategic Consulting"
            description="Tailored business and financial consulting services to drive your corporate goals forward with clarity and precision."
            image="https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <svg class="w-6 h-6 text-brand-dark" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                </svg>
            </x-slot:icon>
        </x-ui.expertise-card>
    </div>
</x-ui.section>
