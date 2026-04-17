<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <a href="{{ route('team-members') }}" wire:navigate class="inline-flex items-center gap-2 text-sm font-semibold text-brand-green hover:text-brand-dark mb-2 transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali ke Daftar
                </a>
                <h2 class="font-cursive text-4xl leading-tight text-brand-dark md:text-5xl">
                    Edit Team Member
                </h2>
                <p class="mt-1 text-sm text-brand-gray">
                    Perbarui profil untuk anggota tim ini.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="bg-brand-light min-h-screen pb-12">
        <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">
            <livewire:admin.team-member.edit :teamMember="$teamMember" />
        </div>
    </div>
</x-app-layout>
