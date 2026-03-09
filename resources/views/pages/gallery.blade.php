<x-layouts.main :showFooter="false">
    <!-- Background Gradient Overlay -->
    <div class="fixed top-0 left-0 w-full h-full z-0 pointer-events-none bg-gradient-to-b from-brand-light to-brand-yellow/50 backdrop-blur-[2px]"></div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-[1440px] mx-auto min-h-screen px-6 md:px-12 lg:px-24 flex flex-col lg:flex-row lg:overflow-hidden lg:h-screen pt-28 lg:pt-0">
        
        <!-- Headers & Text -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center gap-8 lg:gap-12 pb-12 lg:pb-0 h-auto lg:h-full shrink-0">
            <div class="flex flex-col gap-4 text-brand-green">
                <h2 class="font-normal text-xl">Unvaluable Story</h2>
                <h1 class="font-bold text-4xl md:text-5xl lg:text-6xl leading-tight">
                    Discover and Share Stunning Story At Our Gallery
                </h1>
            </div>

            <div class="flex items-center gap-3 text-brand-green font-medium text-lg lg:text-xl mt-4 lg:mt-8 animate-bounce hidden lg:flex">
                <span>Scroll to explore</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>

        <!-- Dynamic Livewire Gallery Grid -->
        <div class="w-full lg:w-1/2 lg:h-screen lg:overflow-y-auto pointer-events-auto flex justify-center lg:justify-end pb-12 lg:pt-32 lg:pb-32 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
            <div class="w-full max-w-[550px]">
                <livewire:gallery.gallery-grid />
            </div>
        </div>
        
    </div>
</x-layouts.main>