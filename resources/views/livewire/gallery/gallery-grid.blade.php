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
            <!-- Gallery Modal -->
            <div class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center" wire:click.self="closeModal">

                <!-- Modal Box: 88% viewport -->
                <div class="relative bg-brand-green w-[88vw] h-[88vh] flex flex-col md:flex-row overflow-hidden mt-12">

                <!-- Close Button: yellow circle, top-right of modal -->
                <button wire:click="closeModal" class="absolute top-4 right-4 z-50 w-10 h-10 rounded-full bg-brand-yellow flex items-center justify-center hover:bg-brand-yellow/80 transition-colors">
                    <i class="fa-solid fa-xmark text-brand-green text-xl"></i>
                </button>

                <!-- Navigation Left: small white rounded button on left edge -->
                <button wire:click="prevImage" class="absolute left-3 top-1/2 -translate-y-1/2 z-50 bg-white rounded-2xl hover:bg-gray-100 transition-colors w-8 h-8 flex items-center justify-center shadow-md">
                    <i class="fa-solid fa-chevron-left text-gray-900 text-base"></i>
                </button>

                <!-- Navigation Right: small white rounded button on right edge -->
                <button wire:click="nextImage" class="absolute right-3 top-1/2 -translate-y-1/2 z-50 bg-white rounded-2xl hover:bg-gray-100 transition-colors w-8 h-8 flex items-center justify-center shadow-md">
                    <i class="fa-solid fa-chevron-right text-gray-900 text-base"></i>
                </button>

                <!-- Content: image left, info right -->
                <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-12 w-full h-full px-12 md:px-16 pt-12 pb-8 md:py-10">

                    <!-- Portrait Image -->
                    <div class="flex-shrink-0 flex items-center justify-center md:h-full">
                        <img
                            src="{{ $selectedItem['image'] }}"
                            alt="{{ $selectedItem['title'] ?? 'Gallery Image' }}"
                            class="h-[32vh] md:h-[76vh] w-auto max-w-[80vw] md:max-w-none aspect-[430/602] object-cover"
                        >
                    </div>

                    <!-- Info Panel -->
                    <div class="flex flex-col justify-center gap-4 text-white flex-1 md:max-w-[450px]">
                        <p class="text-sm md:text-base font-medium text-white">
                            {{ $selectedItem['subtitle'] ?? 'Christin' }}
                        </p>
                        <h2 class="text-lg md:text-xl font-medium text-white leading-snug">
                            {{ $selectedItem['title'] ?? 'Title gallery Christin' }}
                        </h2>
                        <p class="text-sm md:text-base font-medium text-white leading-relaxed text-justify">
                            {{ $selectedItem['description'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' }}
                        </p>
                    </div>
                </div>
                </div><!-- end modal box -->
            </div>
        @endif
    @endif
</div>
