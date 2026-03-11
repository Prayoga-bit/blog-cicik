<x-layouts.main>

    <div class="bg-brand-light min-h-screen">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 pt-32 pb-20">

            {{-- Page Heading --}}
            <div class="text-center mb-16">
                <h1 class="font-cursive text-[72px] leading-none text-brand-dark mb-6">Get In Touch</h1>
                <p class="text-brand-gray text-xl">
                    Have a question or want to work together? We'd love to hear from you.
                </p>
            </div>

            {{-- Form + Sidebar --}}
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_340px] gap-8 mb-8">

                {{-- Contact Form (Livewire) --}}
                @livewire('contact-form')

                {{-- Info Sidebar --}}
                <x-contact.info-sidebar />

            </div>

            {{-- Map --}}
            <x-contact.map-section />

        </div>
    </div>

</x-layouts.main>
