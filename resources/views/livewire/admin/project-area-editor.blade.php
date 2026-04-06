<div class="space-y-6 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            @if ($statusMessage)
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ $statusMessage }}
                </div>
            @endif

            @forelse ($areas as $index => $area)
                <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm" wire:key="area-{{ $area['id'] }}">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $area['title'] ?: 'Project Area' }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ __('Update details for this project area.') }}
                                </p>
                            </div>

                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium uppercase tracking-wide text-gray-600">
                                #{{ $area['id'] }}
                            </span>
                        </div>
                    </div>

                    <form wire:submit.prevent="saveArea({{ $area['id'] }})" class="space-y-4 px-6 py-6">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="area-title-{{ $area['id'] }}">
                                {{ __('Title') }}
                            </label>
                            <input
                                id="area-title-{{ $area['id'] }}"
                                type="text"
                                wire:model="areas.{{ $index }}.title"
                                class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('areas.' . $index . '.title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="area-description-{{ $area['id'] }}">
                                {{ __('Description') }}
                            </label>
                            <textarea
                                id="area-description-{{ $area['id'] }}"
                                wire:model="areas.{{ $index }}.description"
                                rows="4"
                                class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            ></textarea>
                            @error('areas.' . $index . '.description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="area-icon-{{ $area['id'] }}">
                                {{ __('Icon URL / Icon Class') }}
                            </label>
                            <input
                                id="area-icon-{{ $area['id'] }}"
                                type="text"
                                wire:model="areas.{{ $index }}.icon_url"
                                placeholder="fa-solid fa-chart-column atau https://..."
                                class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('areas.' . $index . '.icon_url')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="area-image-{{ $area['id'] }}">
                                {{ __('Image URL') }}
                            </label>
                            <input
                                id="area-image-{{ $area['id'] }}"
                                type="text"
                                wire:model="areas.{{ $index }}.image_url"
                                placeholder="https://..."
                                class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('areas.' . $index . '.image_url')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            @if ($savedAreaId === $area['id'])
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
                                <span wire:loading.remove>{{ __('Save Area') }}</span>
                                <span wire:loading>{{ __('Saving...') }}</span>
                            </button>
                        </div>
                    </form>
                </section>
            @empty
                <div class="rounded-lg border border-dashed border-gray-300 bg-white px-6 py-10 text-center text-sm text-gray-500">
                    {{ __('No project areas are available yet.') }}
                </div>
            @endforelse
        </div>
    </div>
</div>