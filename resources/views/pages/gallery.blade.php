<x-layouts.main :showFooter="false">
    <!-- Background Gradient Overlay -->
    <div class="fixed top-0 left-0 w-full h-screen z-0 pointer-events-none bg-gradient-to-b from-brand-light to-brand-yellow/50 backdrop-blur-[2px]"></div>

    <div class="relative z-10 w-full max-w-[1440px] mx-auto h-screen px-6 md:px-12 lg:px-24">
        
        <!-- Headers & Text -->
        <div class="absolute top-1/3 left-6 md:left-12 lg:left-24 w-[90%] lg:w-[45%] flex flex-col gap-12 pointer-events-auto -translate-y-10">
            <div class="flex flex-col gap-4 text-brand-green">
                <h2 class="font-normal text-xl">Unvaluable Story</h2>
                <h1 class="font-bold text-5xl md:text-6xl leading-tight">
                    Discover and Share Stunning Story At Our Gallery
                </h1>
            </div>

            <div class="flex items-center gap-3 text-brand-green font-medium text-xl mt-8 animate-bounce">
                <span>Scroll to explore</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>

        <!-- Dynamic Livewire Gallery Grid -->
        <div class="absolute top-0 right-6 md:right-12 lg:right-24 h-screen w-full lg:w-[50%] overflow-y-auto pointer-events-auto flex justify-end pb-12 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
            <div class="pt-32 w-full max-w-[550px]">
                <livewire:gallery.gallery-grid />
            </div>
        </div>
    </div>
</x-layouts.main>