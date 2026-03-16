<x-layouts.main>

    {{-- Hero Section --}}
    @include('components.about.hero')

    {{-- Vision & Mission Section --}}
    @include('components.about.vision-mission')

    {{-- Our Expertise Section --}}
    <x-about.expertise />

    {{-- Meet The Team Section --}}
    @include('components.about.team')

</x-layouts.main>
