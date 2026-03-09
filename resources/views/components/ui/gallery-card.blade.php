@props(['image', 'title' => null, 'creator' => null])

<div class="relative w-full h-[300px] sm:h-[350px] overflow-hidden group cursor-pointer shadow-sm hover:shadow-xl transition-all duration-300 rounded-lg">
    <div class="absolute inset-0 bg-brand-yellow/20 z-0"></div>
    <img alt="{{ $title ?? 'Gallery Image' }}" loading="lazy" class="absolute inset-0 object-cover w-full h-full z-10 transition-transform duration-500 group-hover:scale-105" src="{{ $image }}" />
    
    <!-- Hover Overlay -->
    <div class="absolute inset-0 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between items-center pb-0">
        <!-- Overlay Dark Gradient for readability -->
        <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>

        <!-- Center Explore Button -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-14 h-14 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center translate-y-4 group-hover:translate-y-0 transition-all duration-300 z-30">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </div>
        
        <!-- Bottom Tag -->
        <div class="absolute bottom-0 w-full z-30 flex flex-col items-center pb-0">
            <div class="bg-brand-green w-full pt-2 pb-6 px-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out text-center">
                <span class="text-white font-medium text-sm block mb-1">{{ $creator ?? 'Christin' }}</span>
                <h3 class="text-white text-lg font-medium leading-tight line-clamp-1">{{ $title ?? 'Title gallery Christin' }}</h3>
            </div>
        </div>
    </div>
</div>