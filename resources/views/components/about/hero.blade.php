{{-- About Hero Section --}}
<section class="relative w-full min-h-[700px] flex items-center bg-brand-light pt-28 pb-16 px-6 md:px-12 lg:px-24 overflow-hidden">
    {{-- Background Gradient Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-brand-yellow/50 backdrop-blur-[2.5px] pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto w-full flex flex-col lg:flex-row items-center gap-12">
        {{-- Left Content --}}
        <div class="flex flex-col gap-8 w-full lg:w-1/2">
            <div class="inline-block bg-brand-yellow rounded-full px-5 py-1.5 text-sm font-bold text-brand-dark w-max">
                WHO WE ARE
            </div>

            <div class="flex flex-col gap-4">
                <h1 class="font-bold text-5xl md:text-[64px] text-brand-green leading-tight">
                    ABOUT US
                </h1>
                {{-- Wavy Divider --}}
                <svg class="w-[221px] h-[3px]" viewBox="0 0 221 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 1.5C20 0 40 3 60 1.5C80 0 100 3 120 1.5C140 0 160 3 180 1.5C200 0 210 1.5 221 1.5" stroke="#20544a" stroke-width="2"/>
                </svg>
            </div>

            <p class="font-medium text-xl text-brand-green leading-relaxed max-w-[430px]">
                We are a team of dedicated professionals committed to providing expert financial advice and strategies. Our mission is to empower your financial future through innovative solutions and personalized care. With years of experience and a passion for excellence, we help our clients navigate the complexities of financial markets.
            </p>

            <div>
                <x-ui.button variant="secondary" href="#vision" class="shadow-lg text-xl px-8 py-3">
                    More Info
                </x-ui.button>
            </div>
        </div>

        {{-- Right Image --}}
        <div class="w-full lg:w-1/2 relative">
            {{-- Yellow Border Offset --}}
            <div class="absolute top-5 left-5 w-full h-[480px] rounded-3xl border-[1.6px] border-brand-yellow"></div>

            {{-- Main Image --}}
            <div class="relative w-full h-[480px] rounded-3xl overflow-clip shadow-2xl">
                <img alt="Modern corporate building" loading="lazy" class="object-cover w-full h-full"
                     src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1000&auto=format&fit=crop" />
                <div class="absolute inset-0 bg-gradient-to-t from-brand-green/40 to-transparent"></div>
            </div>

            {{-- 95% Client Success Badge --}}
            <div class="absolute -top-4 right-0 bg-brand-yellow pl-5 pr-5 py-3 rounded-2xl shadow-lg flex items-center gap-3">
                <div class="w-10 h-10 bg-brand-green rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-brand-dark text-lg leading-tight">95%</p>
                    <p class="text-brand-dark/70 text-xs">Client Success</p>
                </div>
            </div>

            {{-- 10+ Years Badge --}}
            <div class="absolute -bottom-6 -left-6 bg-white pl-6 py-5 pr-8 rounded-2xl shadow-xl">
                <p class="font-bold text-brand-green text-3xl leading-tight">10+</p>
                <p class="text-brand-muted text-sm">Years of Experience</p>
            </div>
        </div>
    </div>
</section>
