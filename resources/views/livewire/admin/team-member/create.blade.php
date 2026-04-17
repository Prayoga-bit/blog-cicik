<div class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm">
    <form wire:submit.prevent="save" class="space-y-6 px-6 py-8">
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
            <textarea id="bio_description" wire:model="bio_description" rows="5" class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green placeholder:text-brand-muted/50" placeholder="Ceritakan singkat mengenai member ini..."></textarea>
            @error('bio_description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-brand-dark" for="photo">
                {{ __('Photo Profile') }} <span class="text-xs font-normal text-brand-muted ml-1">(Max: 5MB, Format: JPG/PNG/WEBP)</span>
            </label>
            
            <div class="flex items-start gap-6 mt-2">
                @if ($photo)
                    <div class="relative w-32 aspect-[3/4] rounded-2xl border border-brand-green/20 overflow-hidden shrink-0 bg-brand-light shadow-sm">
                        <img src="{{ $photo->temporaryUrl() }}" class="h-full w-full object-cover">
                    </div>
                @else
                    <div class="w-32 aspect-[3/4] rounded-2xl border-2 border-dashed border-brand-green/20 bg-brand-light/30 flex items-center justify-center shrink-0">
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
            <a href="{{ route('team-members') }}" wire:navigate class="rounded-full bg-brand-light px-5 py-2.5 text-sm font-semibold text-brand-dark transition hover:bg-brand-light/80">
                Batal
            </a>
            <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center gap-2 rounded-full bg-brand-green px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-brand-dark disabled:cursor-not-allowed disabled:opacity-75">
                <i class="fa-solid fa-floppy-disk"></i>
                <span wire:loading.remove wire:target="save">{{ __('Simpan Data Member') }}</span>
                <span wire:loading wire:target="save">{{ __('Menyimpan...') }}</span>
            </button>
        </div>
    </form>
</div>
