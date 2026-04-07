<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Edit Blog Post
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Update the selected blog post details.
                </p>
            </div>
            <a href="{{ route('blog-editor') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-green hover:text-brand-dark">
                <i class="fa-solid fa-arrow-left"></i>
                Back to list
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <livewire:admin.blog-edit-form :blog="$blog" />
        </div>
    </div>
</x-app-layout>
