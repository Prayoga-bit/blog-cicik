@props(['title', 'description', 'image', 'icon', 'variant' => 'default'])

@php
$variants = [
    'default' => [
        'height' => 'h-[400px]',
        'shadow' => 'shadow-md',
        'overlay' => 'bg-brand-dark/60',
        'layout' => 'justify-between',
        'iconBg' => 'bg-brand-green',
        'iconSpacing' => '',
        'textWrap' => '',
        'titleSpacing' => 'mb-2',
    ],
    'gradient' => [
        'height' => 'h-[420px]',
        'shadow' => 'shadow-lg',
        'overlay' => 'bg-gradient-to-t from-black/80 via-black/30 to-transparent',
        'layout' => '',
        'iconBg' => 'bg-brand-yellow',
        'iconSpacing' => 'mt-20 sm:mt-24',
        'textWrap' => 'mt-4 flex flex-col gap-2 flex-1',
        'titleSpacing' => '',
    ],
];

$v = $variants[$variant] ?? $variants['default'];
@endphp

<div class="relative {{ $v['height'] }} w-full rounded-2xl overflow-clip {{ $v['shadow'] }} group">
    <img alt="{{ $title }}" loading="lazy"
         class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500"
         src="{{ $image }}" />
    <div class="absolute inset-0 {{ $v['overlay'] }}"></div>

    <div class="absolute inset-0 p-6 flex flex-col {{ $v['layout'] }}">
        <div class="w-12 h-12 {{ $v['iconBg'] }} rounded-full flex items-center justify-center {{ $v['iconSpacing'] }}">
            {{ $icon }}
        </div>
        <div class="{{ $v['textWrap'] }}">
            <h3 class="font-bold text-xl text-white {{ $v['titleSpacing'] }}">{{ $title }}</h3>
            <p class="text-gray-200 text-sm leading-relaxed">{{ $description }}</p>
        </div>
    </div>
</div>
