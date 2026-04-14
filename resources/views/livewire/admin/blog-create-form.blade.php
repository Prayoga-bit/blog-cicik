<div class="space-y-6">
    <form wire:submit.prevent="save" class="space-y-4 rounded-2xl border border-brand-green/10 bg-white p-6 shadow-sm">
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-title">{{ __('Title') }}</label>
            <input id="post-title" type="text" wire:model="title" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
            @error('title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
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
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-image">{{ __('Featured Image URL') }}</label>
            <input id="post-image" type="text" wire:model="featured_image" placeholder="https://..." class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
            @error('featured_image') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-content">{{ __('Content') }}</label>
            <div class="rounded-lg border border-gray-300 bg-white shadow-sm">
                <x-rich-text::input
                    id="post-content"
                    name="content"
                    wire:model="content"
                    wire:key="blog-create-content-editor"
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
                <span wire:loading.remove>{{ __('Create Post') }}</span>
                <span wire:loading>{{ __('Saving...') }}</span>
            </button>
        </div>
    </form>
</div>
