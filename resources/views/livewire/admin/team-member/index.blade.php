<div class="space-y-6">
    @if (session()->has('message'))
        <div class="rounded-lg border border-brand-green/30 bg-brand-green/20 px-4 py-3 text-sm text-brand-dark">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($members as $member)
            <div class="flex flex-col items-center gap-4 relative group">
                <div class="w-full aspect-[3/4] max-w-[200px] rounded-3xl overflow-clip shadow-xl relative">
                    <div class="relative w-full h-full">
                        @if ($member->photo_url)
                            <img alt="{{ $member->name }}" loading="lazy" class="object-cover w-full h-full" src="{{ str_starts_with($member->photo_url, 'http') ? $member->photo_url : asset('storage/' . $member->photo_url) }}" />
                        @else
                            <div class="w-full h-full bg-brand-light flex items-center justify-center">
                                <i class="fa-solid fa-user text-6xl text-brand-green/30"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-brand-green/20"></div>
                        
                        <!-- Overlay actions -->
                        <div class="absolute inset-0 bg-brand-dark/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center gap-3 backdrop-blur-sm">
                            <a href="{{ route('team-members.edit', $member->id) }}" wire:navigate class="w-32 inline-flex items-center justify-center gap-2 rounded-full bg-brand-yellow px-4 py-2 text-sm font-semibold text-brand-dark hover:bg-brand-yellow/80 transition">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <button wire:click="deleteMember({{ $member->id }})" wire:confirm="Apakah Anda yakin ingin menghapus member ini?" class="w-32 inline-flex items-center justify-center gap-2 rounded-full bg-red-500 px-4 py-2 text-sm font-semibold text-white hover:bg-red-600 transition">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="font-bold text-brand-dark text-xl">{{ $member->name }}</h3>
                    <p class="text-brand-muted text-base">{{ $member->position }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-1 xl:col-span-4 sm:col-span-2 lg:col-span-3 rounded-2xl border border-dashed border-brand-green/20 bg-white px-6 py-12 text-center shadow-sm flex flex-col items-center justify-center">
                <i class="fa-solid fa-users text-4xl text-brand-green/20 mb-3"></i>
                <p class="text-brand-dark font-semibold">{{ __('Belum ada team member.') }}</p>
                <p class="text-sm text-brand-muted mt-1">{{ __('Klik tombol Tambah Member Baru untuk memasukkan data anggota tim.') }}</p>
            </div>
        @endforelse
    </div>
</div>
