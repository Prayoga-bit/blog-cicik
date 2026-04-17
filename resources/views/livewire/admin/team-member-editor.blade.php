<div class="space-y-6">
    @if (session()->has('message'))
        <div class="rounded-lg border border-brand-green/30 bg-brand-green/20 px-4 py-3 text-sm text-brand-dark">
            {{ session('message') }}
        </div>
    @elseif ($statusMessage)
        <div class="rounded-lg border border-brand-green/30 bg-brand-green/20 px-4 py-3 text-sm text-brand-dark">
            {{ $statusMessage }}
        </div>
    @endif

    @if (!$isFormOpen)
        <div class="flex items-center justify-between bg-white px-6 py-4 rounded-2xl shadow-sm border border-brand-green/10">
            <div>
                <h3 class="text-xl font-bold text-brand-dark">Daftar Team Member</h3>
                <p class="text-sm text-brand-muted">Kelola data anggota tim yang akan ditampilkan di halaman depan.</p>
            </div>
            <button wire:click="createNew" class="inline-flex items-center gap-2 rounded-full bg-brand-green px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-brand-dark">
                <i class="fa-solid fa-plus"></i>
                Tambah Member Baru
            </button>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($members as $member)
                <div class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm flex flex-col hover:shadow-md transition">
                    <div class="h-48 w-full bg-brand-light flex items-center justify-center overflow-hidden relative">
                        @if ($member['photo_url'])
                            <img src="{{ str_starts_with($member['photo_url'], 'http') ? $member['photo_url'] : asset('storage/' . $member['photo_url']) }}" alt="{{ $member['name'] }}" class="h-full w-full object-cover">
                        @else
                            <i class="fa-solid fa-user text-4xl text-brand-green/30"></i>
                        @endif
                    </div>
                    <div class="flex flex-col flex-1 p-5">
                        <div class="flex justify-between items-start mb-1">
                            <h4 class="text-lg font-bold text-brand-dark">{{ $member['name'] }}</h4>
                            <span class="inline-flex items-center rounded-full bg-brand-light px-2 py-0.5 text-xs font-semibold text-brand-dark">
                                #{{ $member['id'] }}
                            </span>
                        </div>
                        <p class="text-sm font-medium text-brand-green mb-3">{{ $member['position'] }}</p>
                        <p class="text-sm text-brand-muted line-clamp-3 mb-4">{{ $member['bio_description'] }}</p>
                        
                        <div class="mt-auto flex items-center gap-3 pt-4 border-t border-brand-green/5">
                            <button wire:click="editMember({{ $member['id'] }})" class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg bg-brand-yellow px-4 py-2 text-sm font-semibold text-brand-dark hover:bg-brand-yellow/80 transition">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>
                            <button wire:click="deleteMember({{ $member['id'] }})" wire:confirm="Apakah Anda yakin ingin menghapus member ini?" class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-100 px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-200 transition" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 rounded-2xl border border-dashed border-brand-green/20 bg-white px-6 py-12 text-center shadow-sm flex flex-col items-center justify-center">
                    <i class="fa-solid fa-users text-4xl text-brand-green/20 mb-3"></i>
                    <p class="text-brand-dark font-semibold">{{ __('Belum ada team member.') }}</p>
                    <p class="text-sm text-brand-muted mt-1">{{ __('Klik tombol Tambah Member Baru untuk memasukkan data anggota tim.') }}</p>
                </div>
            @endforelse
        </div>

    @else
        <div class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm">
            <div class="border-b border-brand-green/5 px-6 py-4 flex items-center text-brand-dark bg-brand-light/20">
                <button wire:click="closeForm" class="mr-4 text-brand-muted hover:text-brand-dark transition bg-white h-8 w-8 rounded-full flex items-center justify-center shadow-sm border border-brand-green/10">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <h3 class="text-lg font-bold">
                    {{ $isEditing ? 'Edit Team Member: ' . $name : 'Tambah Team Member Baru' }}
                </h3>
            </div>

            <form wire:submit.prevent="saveMember" class="space-y-6 px-6 py-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-brand-dark" for="name">
                            {{ __('Name (Nama)') }} <span class="text-red-500">*</span>
                        </label>
                        <input id="name" type="text" wire:model="name" class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green placeholder:text-brand-muted/50" placeholder="Masukkan nama..." />
                        @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-semibold text-brand-dark" for="position">
                            {{ __('Position (Jabatan)') }} <span class="text-red-500">*</span>
                        </label>
                        <input id="position" type="text" wire:model="position" class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green placeholder:text-brand-muted/50" placeholder="Contoh: CEO, Developer..." />
                        @error('position') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-semibold text-brand-dark" for="bio_description">
                        {{ __('Bio Description (Deskripsi Bio)') }} <span class="text-red-500">*</span>
                    </label>
                    <textarea id="bio_description" wire:model="bio_description" rows="4" class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green placeholder:text-brand-muted/50" placeholder="Ceritakan singkat mengenai member ini..."></textarea>
                    @error('bio_description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="mb-1 block text-sm font-semibold text-brand-dark" for="photo">
                        {{ __('Photo Profile') }} <span class="text-xs font-normal text-brand-muted ml-1">(Max: 5MB, Format: JPG/PNG/WEBP)</span>
                    </label>
                    
                    <div class="flex items-start gap-6 mt-2">
                        @if ($photo)
                            <div class="relative h-32 w-32 rounded-xl border border-brand-green/20 overflow-hidden shrink-0 bg-brand-light">
                                <img src="{{ $photo->temporaryUrl() }}" class="h-full w-full object-cover">
                            </div>
                        @elseif ($oldPhoto)
                            <div class="relative h-32 w-32 rounded-xl border border-brand-green/20 overflow-hidden shrink-0 bg-brand-light">
                                <img src="{{ str_starts_with($oldPhoto, 'http') ? $oldPhoto : asset('storage/' . $oldPhoto) }}" class="h-full w-full object-cover">
                            </div>
                        @else
                            <div class="h-32 w-32 rounded-xl border-2 border-dashed border-brand-green/20 bg-brand-light/30 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-image text-3xl text-brand-green/30"></i>
                            </div>
                        @endif

                        <div class="flex-1">
                            <input id="photo" type="file" wire:model="photo" accept="image/png, image/jpeg, image/jpg, image/webp" class="block w-full text-sm text-brand-dark file:mr-4 file:rounded-full file:border-0 file:bg-brand-green/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-brand-green hover:file:bg-brand-green/20 cursor-pointer" />
                            <div wire:loading wire:target="photo" class="mt-3 inline-flex items-center gap-2 text-sm text-brand-green">
                                <i class="fa-solid fa-circle-notch fa-spin"></i> Uploading...
                            </div>
                            @error('photo') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-6 border-t border-brand-green/5">
                    <button type="button" wire:click="closeForm" class="rounded-full bg-brand-light px-5 py-2.5 text-sm font-semibold text-brand-dark transition hover:bg-brand-light/80">
                        Batal
                    </button>
                    <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center gap-2 rounded-full bg-brand-green px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-brand-dark disabled:cursor-not-allowed disabled:opacity-75">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span wire:loading.remove wire:target="saveMember">{{ __('Simpan Data Member') }}</span>
                        <span wire:loading wire:target="saveMember">{{ __('Menyimpan...') }}</span>
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>