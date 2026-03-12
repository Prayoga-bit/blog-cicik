{{-- Stats Section --}}
<section class="bg-brand-green py-16 w-full">
    <div class="max-w-7xl mx-auto px-6 md:px-12 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-12">
        <x-ui.stat
            value="{{ $sections->get('stat_client_retention')?->content ?? '95%' }}"
            label="{{ $sections->get('stat_client_retention_label')?->content ?? 'Client Retention' }}"
        />
        <x-ui.stat
            value="{{ $sections->get('stat_business_growth')?->content ?? '98%' }}"
            label="{{ $sections->get('stat_business_growth_label')?->content ?? 'Business Growth' }}"
        />
        <x-ui.stat
            value="{{ $sections->get('stat_average_rating')?->content ?? '5.00' }}"
            label="{{ $sections->get('stat_average_rating_label')?->content ?? 'Average Rating' }}"
        />
        <x-ui.stat
            value="{{ $sections->get('stat_happy_clients')?->content ?? '10k+' }}"
            label="{{ $sections->get('stat_happy_clients_label')?->content ?? 'Happy Clients' }}"
            :borderRight="false"
        />
    </div>
</section>
