<div class="space-y-6 rounded-[32px] bg-brand-light/70 py-12 shadow-sm ring-1 ring-brand-green/5">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            @if ($statusMessage)
                <div class="rounded-lg border border-brand-yellow/30 bg-brand-yellow/20 px-4 py-3 text-sm text-brand-dark">
                    {{ $statusMessage }}
                </div>
            @endif

            @forelse ($areas as $index => $area)
                <section class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm" wire:key="area-{{ $area['id'] }}">
                    <div class="border-b border-brand-green/5 px-6 py-4">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-brand-dark">
                                    {{ $area['title'] ?: 'Project Area' }}
                                </h3>
                                <p class="text-sm text-brand-muted">
                                    {{ __('Update details for this project area.') }}
                                </p>
                            </div>

                            <span class="inline-flex items-center rounded-full bg-brand-light px-3 py-1 text-xs font-semibold uppercase tracking-wide text-brand-dark">
                                #{{ $area['id'] }}
                            </span>
                        </div>
                    </div>

                    <form wire:submit.prevent="saveArea({{ $area['id'] }})" class="space-y-4 px-6 py-6">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-brand-dark" for="area-title-{{ $area['id'] }}">
                                {{ __('Title') }}
                            </label>
                            <input
                                id="area-title-{{ $area['id'] }}"
                                type="text"
                                wire:model="areas.{{ $index }}.title"
                                class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('areas.' . $index . '.title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-semibold text-brand-dark" for="area-description-{{ $area['id'] }}">
                                {{ __('Description') }}
                            </label>
                            <textarea
                                id="area-description-{{ $area['id'] }}"
                                wire:model="areas.{{ $index }}.description"
                                rows="4"
                                class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            ></textarea>
                            @error('areas.' . $index . '.description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-semibold text-brand-dark" for="area-icon-{{ $area['id'] }}">
                                {{ __('Icon URL / Icon Class') }}
                            </label>
                            <input
                                id="area-icon-{{ $area['id'] }}"
                                type="text"
                                wire:model="areas.{{ $index }}.icon_url"
                                placeholder="fa-solid fa-chart-column atau https://..."
                                class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('areas.' . $index . '.icon_url')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-semibold text-brand-dark" for="area-image-{{ $area['id'] }}">
                                {{ __('Image URL') }}
                            </label>
                            <input
                                id="area-image-{{ $area['id'] }}"
                                type="text"
                                wire:model="areas.{{ $index }}.image_url"
                                placeholder="https://..."
                                class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('areas.' . $index . '.image_url')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between gap-4 pt-4">
                            @if ($savedAreaId === $area['id'])
                                <p class="text-sm font-medium text-brand-green">
                                    {{ __('Saved.') }}
                                </p>
                            @else
                                <span></span>
                            @endif

                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-full bg-brand-green px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-brand-dark disabled:cursor-not-allowed disabled:opacity-75"
                                wire:loading.attr="disabled"
                            >
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span wire:loading.remove>{{ __('Save Area') }}</span>
                                <span wire:loading>{{ __('Saving...') }}</span>
                            </button>
                        </div>
                    </form>
                </section>
            @empty
                <div class="rounded-xl border border-dashed border-brand-green/20 bg-white px-6 py-10 text-center text-sm text-brand-muted shadow-sm">
                    {{ __('No project areas are available yet.') }}
                </div>
            @endforelse
        </div>
    </div>
</div>