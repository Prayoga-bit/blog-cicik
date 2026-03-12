{{-- Who We Are Section --}}
<x-ui.section bg="light" id="explore" class="min-h-[700px]">
    <div class="flex flex-col lg:flex-row items-center gap-16 w-full h-full">
        <div class="flex flex-col gap-8 w-full lg:w-1/2">
            <div class="inline-block bg-brand-yellow rounded-full px-4 py-1 text-sm font-bold text-brand-dark w-max">
                {{ $sections->get('who_badge')?->content ?? 'WHO WE ARE' }}
            </div>

            <h2 class="font-bold leading-tight text-4xl md:text-5xl text-brand-dark">
                {{ $sections->get('who_title_line1')?->content ?? 'Empowering Financial Future:' }} <br>
                <span class="text-brand-green">{{ $sections->get('who_title_line2')?->content ?? 'Investing in Success' }}</span>
            </h2>

            <p class="font-normal text-brand-gray text-lg leading-relaxed max-w-[520px]">
                {{ $sections->get('who_description')?->content ?? '' }}
            </p>

            <div class="flex flex-col gap-4 mt-2">
                @foreach ([
                    $sections->get('who_check_1')?->content ?? 'Top Financial Strategy',
                    $sections->get('who_check_2')?->content ?? 'Profit Max Solutions',
                    $sections->get('who_check_3')?->content ?? 'Guest to Advisory',
                    $sections->get('who_check_4')?->content ?? 'Risk Free Curve',
                ] as $item)
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-brand-yellow text-2xl"></i>
                        <span class="font-medium text-brand-dark text-lg">{{ $item }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w-full lg:w-1/2 relative h-[500px] mt-10 lg:mt-0">
            <div class="absolute -top-5 left-5 w-full h-full border-2 border-brand-yellow rounded-3xl z-0"></div>
            <div class="relative w-full h-full rounded-2xl overflow-clip shadow-2xl z-10 bg-gray-200">
                @php
                    $whoImage = $sections->get('who_image');
                    $whoImageSrc = $whoImage?->image_url
                        ? (str_starts_with($whoImage->image_url, 'http') ? $whoImage->image_url : asset('storage/' . $whoImage->image_url))
                        : 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=1000&auto=format&fit=crop';
                    $whoImageAlt = $whoImage?->content ?? 'Corporate advisory meeting';
                @endphp
                <img alt="{{ $whoImageAlt }}" loading="lazy" class="object-cover w-full h-full" src="{{ $whoImageSrc }}" />

                {{-- Floating Card --}}
                <div class="absolute bottom-8 left-8 bg-white p-6 rounded-2xl shadow-lg w-[320px]">
                    <h3 class="font-bold text-brand-green text-lg">{{ $sections->get('who_card_title')?->content ?? 'Risk Management Plan' }}</h3>
                    <p class="font-normal text-brand-muted text-sm mt-2">
                        {{ $sections->get('who_card_text')?->content ?? 'Comprehensive strategies to protect your assets and ensure long-term stability.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-ui.section>
