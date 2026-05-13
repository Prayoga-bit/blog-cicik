<div class="space-y-6">
    @if ($statusMessage)
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ $statusMessage }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4 rounded-2xl border border-brand-green/10 bg-white p-6 shadow-sm">
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="gallery-title">{{ __('Title') }}</label>
            <input id="gallery-title" type="text" wire:model="title" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
            @error('title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="gallery-description">{{ __('Description') }}</label>
            <textarea id="gallery-description" wire:model="description" rows="5" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"></textarea>
            @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="gallery-image">{{ __('Photo') }}</label>
            <input id="gallery-image" type="file" wire:model="image" accept="image/png, image/jpeg, image/jpg, image/webp" class="block w-full text-sm text-brand-dark file:mr-4 file:rounded-full file:border-0 file:bg-brand-green/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-brand-green hover:file:bg-brand-green/20 cursor-pointer" />
            <p class="mt-1 text-xs text-brand-muted">Maks 5 MB.</p>
            @error('image') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror

            @if ($image)
                <div class="mt-3 inline-flex max-w-full justify-center overflow-hidden rounded-xl border border-brand-green/10 bg-brand-light/60 p-3">
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="h-auto w-auto max-w-full" />
                </div>
            @elseif ($currentImageUrl)
                <div class="mt-3 inline-flex max-w-full justify-center overflow-hidden rounded-xl border border-brand-green/10 bg-brand-light/60 p-3">
                    <img src="{{ str_starts_with($currentImageUrl, 'http') ? $currentImageUrl : asset('storage/' . $currentImageUrl) }}" alt="Current photo" class="h-auto w-auto max-w-full" />
                </div>
            @endif
        </div>

        <div class="flex items-center justify-between gap-4 pt-2">
            <a href="{{ $isUserView ? route('user.gallery-editor') : route('gallery-editor') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700">
                Back to list
            </a>

            <button type="submit" class="inline-flex items-center rounded-lg bg-brand-green px-4 py-2 text-sm font-semibold text-white transition hover:bg-brand-dark disabled:cursor-not-allowed disabled:opacity-75" wire:loading.attr="disabled">
                <span wire:loading.remove>{{ __('Save Gallery') }}</span>
                <span wire:loading>{{ __('Saving...') }}</span>
            </button>
        </div>
    </form>
</div>
