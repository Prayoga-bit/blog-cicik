<div class="space-y-6 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            @if ($statusMessage)
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ $statusMessage }}
                </div>
            @endif

            @forelse ($pages as $pageName => $page)
                <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ ucfirst($pageName) }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ __('Update the text blocks for this page.') }}
                                </p>
                            </div>

                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium uppercase tracking-wide text-gray-600">
                                {{ count($page['sections']) }} sections
                            </span>
                        </div>
                    </div>

                    <form wire:submit.prevent="savePage('{{ $pageName }}')" class="space-y-4 px-6 py-6">
                        @foreach ($page['sections'] as $index => $section)
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4" wire:key="section-{{ $section['id'] }}">
                                <div class="mb-3 flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <label for="section-{{ $pageName }}-{{ $section['id'] }}" class="text-sm font-medium text-gray-900">
                                            {{ $section['section_key'] }}
                                        </label>
                                        <p class="text-xs text-gray-500">
                                            {{ $section['image_url'] ? __('Text and image can be updated here.') : __('Text content used by the guest page.') }}
                                        </p>
                                    </div>
                                </div>

                                <textarea
                                    id="section-{{ $pageName }}-{{ $section['id'] }}"
                                    wire:model="pages.{{ $pageName }}.sections.{{ $index }}.content"
                                    rows="4"
                                    class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                                ></textarea>

                                @error('pages.' . $pageName . '.sections.' . $index . '.content')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror

                                <div class="mt-4">
                                    <label for="image-{{ $pageName }}-{{ $section['id'] }}" class="mb-1 block text-sm font-medium text-gray-900">
                                        {{ __('Image URL') }}
                                    </label>
                                    <input
                                        id="image-{{ $pageName }}-{{ $section['id'] }}"
                                        type="text"
                                        wire:model="pages.{{ $pageName }}.sections.{{ $index }}.image_url"
                                        placeholder="https://..."
                                        class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                                    />

                                    @error('pages.' . $pageName . '.sections.' . $index . '.image_url')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        <div class="flex items-center justify-between gap-4">
                            @if ($savedPage === $pageName)
                                <p class="text-sm text-green-700">
                                    {{ __('Saved.') }}
                                </p>
                            @else
                                <span></span>
                            @endif

                            <button
                                type="submit"
                                class="inline-flex items-center rounded-lg bg-brand-green px-4 py-2 text-sm font-semibold text-white transition hover:bg-brand-dark disabled:cursor-not-allowed disabled:opacity-75"
                                wire:loading.attr="disabled"
                            >
                                <span wire:loading.remove>{{ __('Save Page') }}</span>
                                <span wire:loading>{{ __('Saving...') }}</span>
                            </button>
                        </div>
                    </form>
                </section>
            @empty
                <div class="rounded-lg border border-dashed border-gray-300 bg-white px-6 py-10 text-center text-sm text-gray-500">
                    {{ __('No page sections are available yet.') }}
                </div>
            @endforelse
        </div>
    </div>
</div>