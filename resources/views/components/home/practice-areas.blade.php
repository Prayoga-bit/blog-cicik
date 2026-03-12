{{-- Practice Areas Section --}}
<x-ui.section bg="light">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-4xl text-brand-dark">Our Practice Areas</h2>
            <p class="font-normal text-brand-gray text-lg">Specialized financial services designed to maximize your potential.</p>
        </div>
        <x-ui.button variant="outline" href="#">
            View All Services
            <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
        </x-ui.button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-ui.expertise-card
            title="Gold Investment"
            description="Secure your future with tangible assets. We provide expert guidance on gold market trends and acquisition."
            image="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <i class="fa-solid fa-arrow-trend-up text-white text-xl"></i>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card
            title="Forex Trading"
            description="Navigate the global currency markets with our professional trading strategies and risk management tools."
            image="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <i class="fa-solid fa-chart-column text-white text-xl"></i>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card
            title="Risk Management"
            description="Comprehensive insurance and protection plans to safeguard your wealth against unforeseen circumstances."
            image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <i class="fa-solid fa-shield-halved text-white text-xl"></i>
            </x-slot:icon>
        </x-ui.expertise-card>

        <x-ui.expertise-card
            title="Strategic Consulting"
            description="Tailored business and financial advice to help you reach your corporate and personal goals."
            image="https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=800&auto=format&fit=crop"
        >
            <x-slot:icon>
                <i class="fa-solid fa-chart-pie text-white text-xl"></i>
            </x-slot:icon>
        </x-ui.expertise-card>
    </div>
</x-ui.section>
