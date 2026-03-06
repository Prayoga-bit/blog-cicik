@props(['variant' => 'primary', 'href' => null])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium leading-[normal] whitespace-nowrap rounded-[24px] px-8 py-3 transition-colors duration-200';
    
    $variants = [
        'primary' => 'bg-brand-yellow text-brand-dark hover:bg-yellow-400',
        'secondary' => 'bg-brand-green text-white hover:bg-green-800',
        'outline' => 'border-[0.833px] border-brand-dark text-brand-dark hover:bg-gray-100'
    ];
    
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif