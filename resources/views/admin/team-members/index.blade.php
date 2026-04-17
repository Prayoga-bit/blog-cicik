<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <span class="mb-2 inline-flex rounded-full bg-brand-yellow px-4 py-1 text-xs font-bold uppercase tracking-[0.2em] text-brand-dark">
                    Team Admin
                </span>
                <h2 class="font-cursive text-4xl leading-tight text-brand-dark md:text-5xl">
                    Team Members
                </h2>
                <p class="mt-1 text-sm text-brand-gray">
                    Manage team member profiles.
                </p>
            </div>
            <div>
                <a href="{{ route('team-members.create') }}" wire:navigate class="inline-flex items-center gap-2 rounded-full bg-brand-green px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-brand-dark">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Member Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-brand-light min-h-screen pb-12">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <livewire:admin.team-member.index />
        </div>
    </div>
</x-app-layout>
