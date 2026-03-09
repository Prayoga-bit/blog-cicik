<div class="flex gap-6 w-full h-max pb-32">
    <!-- Column 1 -->
    <div class="flex flex-col gap-6 w-1/2 mt-0">
        @foreach(collect($items)->take(3) as $index => $item)
            <div wire:click="openModal({{ $index }})" class="cursor-pointer">
                <x-ui.gallery-card 
                    :image="$item['image']" 
                    :title="$item['title'] ?? null"
                    :creator="$item['subtitle'] ?? null"
                />
            </div>
        @endforeach
    </div>

    <!-- Column 2 (Offset by mt-12 natively matching Figma) -->
    <div class="flex flex-col gap-6 w-1/2 mt-12">
        @foreach(collect($items)->slice(3, 3) as $relativeIndex => $item)
            @php $index = $relativeIndex + 3; @endphp
            <div wire:click="openModal({{ $index }})" class="cursor-pointer">
                <x-ui.gallery-card 
                    :image="$item['image']" 
                    :title="$item['title'] ?? null"
                    :creator="$item['subtitle'] ?? null"
                />
            </div>
        @endforeach
    </div>

    @if($showModal && $selectedIndex !== null)
        @php
            $selectedItem = $items[$selectedIndex] ?? null;
        @endphp
        @if($selectedItem)
            <!-- Modal Overlay -->
            <div class="fixed inset-0 z-50 flex items-center justify-center pt-24 pb-8 px-4 bg-[rgba(26,26,26,0.5)] backdrop-blur-sm transition-opacity duration-300" wire:click.self="closeModal">
                
                <!-- Close Button -->
                <button wire:click="closeModal" class="absolute top-24 right-4 md:right-8 text-white hover:text-white/80 z-50 p-2 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Navigation Left -->
                <button wire:click.stop="prevImage" class="absolute left-2 md:left-8 top-1/2 text-gray-900 z-50 bg-white rounded-2xl hover:bg-gray-100 transition-all w-12 h-12 flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <!-- Navigation Right -->
                <button wire:click.stop="nextImage" class="absolute right-2 md:right-8 top-1/2 text-gray-900 z-50 bg-white rounded-2xl hover:bg-gray-100 transition-all w-12 h-12 flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Modal Content Container -->
                <div class="bg-brand-green w-full max-w-6xl flex flex-col md:flex-row items-stretch justify-center p-6 md:p-10 gap-8 shadow-2xl relative z-40 transform transition-all rounded-none" wire:click.stop>
                    
                    <!-- Left: Large Image -->
                    <div class="w-full md:w-1/2 h-[300px] md:h-auto md:min-h-[500px] relative bg-gray-200">
                        <img src="{{ $selectedItem['image'] }}" alt="{{ $selectedItem['title'] ?? 'Gallery Image' }}" class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    
                    <!-- Right: Info Panel -->
                    <div class="w-full md:w-1/2 flex flex-col justify-center py-4 md:py-8 text-left">
                        <div class="flex flex-col gap-6 text-white max-w-md">
                            <!-- Creator Badge -->
                            <span class="text-base font-medium rounded-full border border-brand-yellow/50 bg-brand-yellow/10 text-brand-yellow px-5 py-2 w-max tracking-wide">
                                {{ $selectedItem['subtitle'] ?? 'Christin' }}
                            </span>
                            
                            <h2 class="text-2xl md:text-4xl font-medium leading-tight text-white mt-2">
                                {{ $selectedItem['title'] ?? 'Title gallery Christin' }}
                            </h2>
                            
                            <p class="text-base md:text-lg text-white/80 leading-relaxed text-justify mt-2">
                                {{ $selectedItem['description'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
