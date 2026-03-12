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
                <i class="fa-solid fa-arrow-trend-up text-brand-dark text-xl"></i>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card variant="gradient"
            title="Forex Trading"
            description="Navigate the global currency markets with professional guidance and cutting-edge trading strategies for consistent growth."
            image="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <i class="fa-solid fa-chart-column text-brand-dark text-xl"></i>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card variant="gradient"
            title="Risk Management"
            description="Comprehensive risk assessment and mitigation strategies to protect your assets and ensure long-term financial stability."
            image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <i class="fa-solid fa-shield-halved text-brand-dark text-xl"></i>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card variant="gradient"
            title="Strategic Consulting"
            description="Tailored business and financial consulting services to drive your corporate goals forward with clarity and precision."
            image="https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <i class="fa-solid fa-chart-pie text-brand-dark text-xl"></i>
            </x-slot:icon>
        </x-ui.expertise-card>
    </div>
</x-ui.section>
