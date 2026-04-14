<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <span class="mb-2 inline-flex rounded-full bg-brand-yellow px-4 py-1 text-xs font-bold uppercase tracking-[0.2em] text-brand-dark">
                    {{ $isUserView ? 'My Blog' : 'Editorial' }}
                </span>
                <h2 class="font-cursive text-4xl leading-tight text-brand-dark md:text-5xl">
                    Create Blog Post
                </h2>
                <p class="mt-1 text-sm text-brand-gray">
                    Add a new blog post.
                </p>
            </div>
            <a href="{{ $isUserView ? route('user.blog-editor') : route('blog-editor') }}" class="inline-flex items-center gap-2 rounded-full border border-brand-green/10 bg-white px-4 py-2 text-sm font-semibold text-brand-green shadow-sm transition hover:-translate-y-0.5 hover:border-brand-green hover:bg-brand-light hover:text-brand-dark">
                <i class="fa-solid fa-arrow-left"></i>
                Back to list
            </a>
        </div>
    </x-slot>

    <div class="bg-brand-light min-h-screen py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <livewire:admin.blog-create-form :is-user-view="$isUserView" />
        </div>
    </div>
</x-app-layout>
