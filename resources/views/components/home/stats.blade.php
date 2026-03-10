{{-- Stats Section --}}
<section class="bg-brand-green py-16 w-full">
    <div class="max-w-7xl mx-auto px-6 md:px-12 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-12">
        <x-ui.stat value="95%" label="Client Retention" />
        <x-ui.stat value="98%" label="Business Growth" />
        <x-ui.stat value="5.00" label="Average Rating" />
        <x-ui.stat value="10k+" label="Happy Clients" :borderRight="false" />
    </div>
</section>
