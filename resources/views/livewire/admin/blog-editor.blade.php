<div class="space-y-6 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            @if ($statusMessage)
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ $statusMessage }}
                </div>
            @endif

            @forelse ($posts as $index => $post)
                <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm" wire:key="blog-post-{{ $post['id'] }}">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $post['title'] ?: 'Blog Post' }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ __('Author:') }} {{ $post['author_name'] }}
                                </p>
                            </div>

                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium uppercase tracking-wide text-gray-600">
                                #{{ $post['id'] }}
                            </span>
                        </div>
                    </div>

                    <form wire:submit.prevent="savePost({{ $post['id'] }})" class="space-y-4 px-6 py-6">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-title-{{ $post['id'] }}">{{ __('Title') }}</label>
                            <input id="post-title-{{ $post['id'] }}" type="text" wire:model="posts.{{ $index }}.title" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
                            @error('posts.' . $index . '.title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-slug-{{ $post['id'] }}">{{ __('Slug') }}</label>
                            <input id="post-slug-{{ $post['id'] }}" type="text" wire:model="posts.{{ $index }}.slug" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
                            @error('posts.' . $index . '.slug') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-category-{{ $post['id'] }}">{{ __('Category') }}</label>
                            <input id="post-category-{{ $post['id'] }}" type="text" wire:model="posts.{{ $index }}.category" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
                            @error('posts.' . $index . '.category') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-image-{{ $post['id'] }}">{{ __('Featured Image URL') }}</label>
                            <input id="post-image-{{ $post['id'] }}" type="text" wire:model="posts.{{ $index }}.featured_image" placeholder="https://..." class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green" />
                            @error('posts.' . $index . '.featured_image') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="post-content-{{ $post['id'] }}">{{ __('Content') }}</label>
                            <textarea id="post-content-{{ $post['id'] }}" wire:model="posts.{{ $index }}.content" rows="8" class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"></textarea>
                            @error('posts.' . $index . '.content') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <label class="inline-flex items-center gap-2 text-sm font-medium text-gray-700">
                            <input type="checkbox" wire:model="posts.{{ $index }}.is_featured" class="rounded border-gray-300 text-brand-green focus:ring-brand-green" />
                            Featured Post
                        </label>

                        <div class="flex items-center justify-between gap-4">
                            @if ($savedPostId === $post['id'])
                                <p class="text-sm text-green-700">{{ __('Saved.') }}</p>
                            @else
                                <span></span>
                            @endif

                            <button type="submit" class="inline-flex items-center rounded-lg bg-brand-green px-4 py-2 text-sm font-semibold text-white transition hover:bg-brand-dark disabled:cursor-not-allowed disabled:opacity-75" wire:loading.attr="disabled">
                                <span wire:loading.remove>{{ __('Save Post') }}</span>
                                <span wire:loading>{{ __('Saving...') }}</span>
                            </button>
                        </div>
                    </form>
                </section>
            @empty
                <div class="rounded-lg border border-dashed border-gray-300 bg-white px-6 py-10 text-center text-sm text-gray-500">
                    No blog posts are available yet.
                </div>
            @endforelse
        </div>
    </div>
</div>