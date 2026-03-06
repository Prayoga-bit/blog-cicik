@props(['bg' => 'white'])

@php
$bgClasses = [
    'white' => 'bg-white',
    'light' => 'bg-brand-light',
    'green' => 'bg-brand-green',
    'dark' => 'bg-brand-dark'
];

$classes = $bgClasses[$bg] ?? 'bg-white';
@endphp

<section {{ $attributes->merge(['class' => "w-full py-20 px-6 md:px-12 lg:px-24 $classes"]) }}>
    <div class="max-w-7xl mx-auto w-full">
        {{ $slot }}
    </div>
</section>