{{-- Practice Areas Section --}}
<x-ui.section bg="light">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-4xl text-brand-dark">
                {{ $sections->get('practice_title')?->content ?? 'Our Practice Areas' }}
            </h2>
            <p class="font-normal text-brand-gray text-lg">
                {{ $sections->get('practice_subtitle')?->content ?? 'Specialized financial services designed to maximize your potential.' }}
            </p>
        </div>
        <x-ui.button variant="outline" href="#">
            {{ $sections->get('practice_view_all_label')?->content ?? 'View All Services' }}
            <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
        </x-ui.button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($projectAreas as $area)
            @php
                $areaImage = $area->image_url
                    ? (str_starts_with($area->image_url, 'http') ? $area->image_url : asset('storage/' . $area->image_url))
                    : 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop';
            @endphp
            <x-ui.expertise-card
                :title="$area->title"
                :description="$area->description"
                :image="$areaImage"
            >
                <x-slot:icon>
                    <i class="{{ $area->icon_url }} text-white text-xl"></i>
                </x-slot:icon>
            </x-ui.expertise-card>
        @endforeach
    </div>
</x-ui.section>
