<div class="space-y-6">
    @if ($statusMessage)
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ $statusMessage }}
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-image">{{ __('Featured Image') }}</label>
            <input id="post-image" type="file" wire:model="featuredImage" accept="image/png, image/jpeg, image/jpg, image/webp" class="block w-full cursor-pointer text-sm text-brand-dark file:mr-4 file:rounded-full file:border-0 file:bg-brand-green/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-brand-green hover:file:bg-brand-green/20" />
            <p class="mt-1 text-xs text-brand-muted">Maks 5 MB.</p>
            @error('featuredImage') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-title">{{ __('Title') }}</label>
            @if ($featuredImage)
            @error('title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

            @elseif ($currentFeaturedImage)
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-slug">{{ __('Slug') }}</label>
            <input id="post-slug" type="text" wire:model="slug" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
            @error('slug') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-category">{{ __('Category') }}</label>
            <input id="post-category" type="text" wire:model="category" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
            @error('category') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-image">{{ __('Featured Image') }}</label>
            <input id="post-image" type="file" wire:model="featuredImage" accept="image/png, image/jpeg, image/jpg, image/webp" class="block w-full text-sm text-brand-dark file:mr-4 file:rounded-full file:border-0 file:bg-brand-green/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-brand-green hover:file:bg-brand-green/20 cursor-pointer" />
            <p class="mt-1 text-xs text-brand-muted">Maks 5 MB.</p>
            @error('featuredImage') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror

            @if ($featuredImage)
                <div class="mt-3 inline-flex max-w-full justify-center overflow-hidden rounded-xl border border-brand-green/10 bg-brand-light/60 p-3">
                    <img src="{{ $featuredImage->temporaryUrl() }}" alt="Preview" class="h-auto w-auto max-w-full" />
                </div>
            @elseif ($currentFeaturedImage)
                <div class="mt-3 inline-flex max-w-full justify-center overflow-hidden rounded-xl border border-brand-green/10 bg-brand-light/60 p-3">
                    <img src="{{ str_starts_with($currentFeaturedImage, 'http') ? $currentFeaturedImage : asset('storage/' . $currentFeaturedImage) }}" alt="Current image" class="h-auto w-auto max-w-full" />
                </div>
            @endif
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-content">{{ __('Content') }}</label>
            <div class="rounded-lg border border-gray-300 bg-white shadow-sm">
                <x-rich-text::input
                    id="post-content"
                    name="content"
                    wire:model="content"
                    wire:key="blog-content-editor"
                    :value="$content"
                    class="rounded-lg"
                />
            </div>
            @error('content') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <label class="inline-flex items-center gap-2 text-sm font-medium text-gray-700">
            <input type="checkbox" wire:model="is_featured" class="rounded border-gray-300 text-brand-green focus:ring-brand-green" />
            Featured Post
        </label>

        <div class="flex items-center justify-between gap-4">
            <a href="{{ $isUserView ? route('user.blog-editor') : route('blog-editor') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700">
                Back to list
            </a>

            <button type="submit" class="inline-flex items-center rounded-lg bg-brand-green px-4 py-2 text-sm font-semibold text-white transition hover:bg-brand-dark disabled:cursor-not-allowed disabled:opacity-75" wire:loading.attr="disabled">
                <span wire:loading.remove>{{ __('Save Post') }}</span>
                <span wire:loading>{{ __('Saving...') }}</span>
            </button>
        </div>
    </form>
</div>
