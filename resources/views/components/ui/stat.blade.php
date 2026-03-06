@props(['value', 'label', 'borderRight' => true])

<div class="flex flex-col items-center justify-center py-4 px-4 sm:px-8 w-full {{ $borderRight ? 'md:border-r md:border-brand-yellow/20' : '' }}">
    <div class="text-brand-yellow font-bold text-4xl md:text-6xl leading-tight text-center">
        {{ $value }}
    </div>
    <div class="text-brand-light/80 font-medium text-base md:text-lg text-center mt-2">
        {{ $label }}
    </div>
</div>