@props(['sections'])

{{-- Contact Information Sidebar --}}
<div class="flex flex-col gap-6">

    {{-- Contact Info Card --}}
    <div class="bg-brand-green rounded-2xl shadow-sm p-8 flex flex-col gap-6">
        <h3 class="text-2xl font-bold text-white">{{ $sections->get('contact_info_title')?->content ?? 'Contact Information' }}</h3>

        <div class="flex flex-col gap-6">
            {{-- Office Address --}}
            <div class="flex items-start gap-4">
                <div class="w-11 h-11 bg-brand-yellow rounded-xl flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-location-dot text-brand-dark text-xl"></i>
                </div>
                <div>
                    <h4 class="text-base font-bold text-white leading-tight">{{ $sections->get('contact_address_title')?->content ?? 'Office Address' }}</h4>
                    <p class="text-sm text-gray-200 mt-1 leading-relaxed">
                        {!! nl2br(e($sections->get('contact_address')?->content ?? "123 Financial District\nJakarta, Indonesia 12345")) !!}
                    </p>
                </div>
            </div>

            {{-- Phone --}}
            <div class="flex items-start gap-4">
                <div class="w-11 h-11 bg-brand-yellow rounded-xl flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-phone text-brand-dark text-xl"></i>
                </div>
                <div>
                    <h4 class="text-base font-bold text-white leading-tight">{{ $sections->get('contact_phone_title')?->content ?? 'Phone' }}</h4>
                    <p class="text-sm text-gray-200 mt-1">{{ $sections->get('contact_phone_1')?->content ?? '+62 21 1234 5678' }}</p>
                    <p class="text-sm text-gray-200">{{ $sections->get('contact_phone_2')?->content ?? '+62 812 3456 7890' }}</p>
                </div>
            </div>

            {{-- Email --}}
            <div class="flex items-start gap-4">
                <div class="w-11 h-11 bg-brand-yellow rounded-xl flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-envelope text-brand-dark text-xl"></i>
                </div>
                <div>
                    <h4 class="text-base font-bold text-white leading-tight">{{ $sections->get('contact_email_title')?->content ?? 'Email' }}</h4>
                    <p class="text-sm text-gray-200 mt-1">{{ $sections->get('contact_email_1')?->content ?? 'info@christineteam.com' }}</p>
                    <p class="text-sm text-gray-200">{{ $sections->get('contact_email_2')?->content ?? 'support@christineteam.com' }}</p>
                </div>
            </div>

            {{-- Business Hours --}}
            <div class="flex items-start gap-4">
                <div class="w-11 h-11 bg-brand-yellow rounded-xl flex items-center justify-center shrink-0">
                    <i class="fa-regular fa-clock text-brand-dark text-xl"></i>
                </div>
                <div>
                    <h4 class="text-base font-bold text-white leading-tight">{{ $sections->get('contact_hours_title')?->content ?? 'Business Hours' }}</h4>
                    <p class="text-sm text-gray-200 mt-1">{{ $sections->get('contact_hours_1')?->content ?? 'Monday – Friday: 9AM – 6PM' }}</p>
                    <p class="text-sm text-gray-200">{{ $sections->get('contact_hours_2')?->content ?? 'Saturday: 9AM – 2PM' }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Response Card --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
        <h3 class="text-xl font-bold text-brand-dark mb-3">{{ $sections->get('contact_quick_response_title')?->content ?? 'Quick Response' }}</h3>
        <p class="text-sm text-brand-gray leading-relaxed">
            {{ $sections->get('contact_quick_response_text')?->content ?? 'We typically respond to all inquiries within 24 hours during business days. For urgent matters, please call our office directly.' }}
        </p>
    </div>

</div>
