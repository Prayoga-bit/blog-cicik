@props(['name', 'position', 'image'])

<div class="flex flex-col items-center gap-4">
    <div class="w-full aspect-[3/4] max-w-[200px] rounded-3xl overflow-clip shadow-xl">
        <div class="relative w-full h-full">
            <img alt="{{ $name }}" loading="lazy" class="object-cover w-full h-full" src="{{ $image }}" />
            <div class="absolute inset-0 bg-brand-green/20"></div>
        </div>
    </div>
    <div class="text-center">
        <h3 class="font-bold text-brand-dark text-xl">{{ $name }}</h3>
        <p class="text-brand-muted text-base">{{ $position }}</p>
    </div>
</div>
