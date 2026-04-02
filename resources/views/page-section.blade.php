<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Page Section') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('Edit the text content and image URLs that appear on guest pages without reloading the page.') }}
                </p>
            </div>
        </div>
    </x-slot>

    <livewire:admin.page-section-editor />
</x-app-layout>