{{-- Vision & Mission Section --}}
<x-ui.section bg="white" id="vision">
    {{-- Section Header --}}
    <div class="flex flex-col items-center gap-6 mb-16">
        <div class="inline-block bg-brand-yellow rounded-full px-5 py-1.5 text-sm font-bold text-brand-dark w-max text-center">
            {{ $sections->get('vision_badge')?->content ?? 'OUR PURPOSE' }}
        </div>
        <h2 class="font-bold text-4xl md:text-5xl text-brand-dark text-center">{{ $sections->get('vision_heading')?->content ?? 'Vision & Mission' }}</h2>
    </div>

    <div class="flex flex-col lg:flex-row items-start gap-16 w-full">
        {{-- Image --}}
        <div class="w-full lg:w-5/12 relative h-[480px] rounded-2xl overflow-clip shadow-2xl">
            @php
                $visionImage = $sections->get('vision_image');
                $visionImageSrc = $visionImage?->image_url
                    ? (str_starts_with($visionImage->image_url, 'http') ? $visionImage->image_url : asset('storage/' . $visionImage->image_url))
                    : 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=1000&auto=format&fit=crop';
                $visionImageAlt = $visionImage?->content ?? 'Business meeting';
            @endphp
              <img alt="{{ $visionImageAlt }}" loading="lazy" class="object-cover w-full h-full"
                 src="{{ $visionImageSrc }}" />
            <div class="absolute inset-0 bg-brand-green/10"></div>
        </div>

        {{-- Content --}}
        <div class="w-full lg:w-7/12 flex flex-col gap-10">
            {{-- Our Vision --}}
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-eye text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-[28px] text-brand-dark">{{ $sections->get('vision_title')?->content ?? 'Our Vision' }}</h3>
                </div>
                <p class="text-brand-gray text-lg leading-relaxed">
                    {{ $sections->get('vision_description')?->content ?? 'To be the leading financial consultancy firm, recognized for our integrity, innovation, and unwavering commitment to client success. We envision a world where financial freedom is accessible to all through smart strategies and expert guidance.' }}
                </p>
            </div>

            {{-- Our Mission --}}
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-brand-yellow rounded-full flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-bullseye text-brand-dark text-xl"></i>
                    </div>
                    <h3 class="font-bold text-[28px] text-brand-dark">{{ $sections->get('mission_title')?->content ?? 'Our Mission' }}</h3>
                </div>
                <ul class="flex flex-col gap-3 mt-1">
                    @foreach ([
                        $sections->get('mission_item_1')?->content ?? 'Provide expert financial guidance tailored to individual needs.',
                        $sections->get('mission_item_2')?->content ?? 'Ensure transparency and trust in all our dealings.',
                        $sections->get('mission_item_3')?->content ?? 'Innovate constantly to stay ahead of market trends.',
                        $sections->get('mission_item_4')?->content ?? 'Empower clients with knowledge and tools for lasting success.',
                    ] as $item)
                        <li class="flex items-start gap-3">
                            <i class="fa-regular fa-circle-check text-brand-green text-xl shrink-0 mt-1"></i>
                            <span class="text-brand-gray text-lg leading-7">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-ui.section>
