<div class="flex gap-6 w-full h-max pb-32">
    <!-- Column 1 -->
    <div class="flex flex-col gap-6 w-1/2 mt-0">
        @foreach(collect($items)->take(3) as $item)
            <x-ui.gallery-card 
                :image="$item['image']" 
                :title="$item['title'] ?? null"
                :creator="$item['subtitle'] ?? null"
            />
        @endforeach
    </div>

    <!-- Column 2 (Offset by mt-12 natively matching Figma) -->
    <div class="flex flex-col gap-6 w-1/2 mt-12">
        @foreach(collect($items)->slice(3, 3) as $item)
            <x-ui.gallery-card 
                :image="$item['image']" 
                :title="$item['title'] ?? null"
                :creator="$item['subtitle'] ?? null"
            />
        @endforeach
    </div>
</div>