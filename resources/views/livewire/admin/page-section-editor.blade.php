<div class="space-y-6 rounded-[32px] bg-brand-light/70 py-12 shadow-sm ring-1 ring-brand-green/5">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            @if ($statusMessage)
                <div class="rounded-lg border border-brand-yellow/30 bg-brand-yellow/20 px-4 py-3 text-sm text-brand-dark">
                    {{ $statusMessage }}
                </div>
            @endif

            @if (! empty($pageNames))
                <section class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm">
                    <div class="border-b border-brand-green/5 px-6 py-4">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-brand-gray">
                            {{ __('Select Page') }}
                        </h3>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 py-4">
                        @foreach ($pageNames as $pageName)
                            <button
                                type="button"
                                wire:click="selectPage('{{ $pageName }}')"
                                class="inline-flex items-center rounded-lg px-3 py-2 text-sm font-medium transition {{ $selectedPage === $pageName ? 'bg-brand-green text-white' : 'bg-brand-light text-brand-gray hover:bg-brand-yellow/50 hover:text-brand-dark' }}"
                            >
                                {{ ucfirst($pageName) }}
                            </button>
                        @endforeach
                    </div>
                </section>

                <section class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm">
                    <div class="border-b border-brand-green/5 px-6 py-4">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-brand-dark">
                                    {{ ucfirst($selectedPage) }}
                                </h3>
                                <p class="text-sm text-brand-muted">
                                    {{ __('Update the text blocks for this page.') }}
                                </p>
                            </div>

                            <span class="inline-flex items-center rounded-full bg-brand-light px-3 py-1 text-xs font-medium uppercase tracking-wide text-brand-dark">
                                {{ count($sections) }} sections
                            </span>
                        </div>
                    </div>

                    <form wire:submit.prevent="savePage" class="space-y-4 px-6 py-6">
                        @foreach ($sections as $index => $section)
                            <div class="rounded-xl border border-brand-green/10 bg-brand-light/30 p-4" wire:key="section-{{ $section['id'] }}">
                                <div class="mb-3 flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <label for="section-{{ $selectedPage }}-{{ $section['id'] }}" class="text-sm font-semibold text-brand-dark">
                                            {{ $section['section_key'] }}
                                        </label>
                                        <p class="text-xs text-brand-muted">
                                            {{ $section['image_url'] ? __('Text and image can be updated here.') : __('Text content used by the guest page.') }}
                                        </p>
                                    </div>
                                </div>

                                <textarea
                                    id="section-{{ $selectedPage }}-{{ $section['id'] }}"
                                    wire:model="sections.{{ $index }}.content"
                                    rows="4"
                                    class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                                ></textarea>

                                @error('sections.' . $index . '.content')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror

                                <div class="mt-4">
                                    <label for="image-{{ $selectedPage }}-{{ $section['id'] }}" class="mb-1 block text-sm font-semibold text-brand-dark">
                                        {{ __('Image URL') }}
                                    </label>
                                    <input
                                        id="image-{{ $selectedPage }}-{{ $section['id'] }}"
                                        type="text"
                                        wire:model="sections.{{ $index }}.image_url"
                                        placeholder="https://..."
                                        class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                                    />

                                    @error('sections.' . $index . '.image_url')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        <div class="flex items-center justify-between gap-4 pt-4">
                            @if ($savedPage === $selectedPage)
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
                                <span wire:loading.remove>{{ __('Save Page') }}</span>
                                <span wire:loading>{{ __('Saving...') }}</span>
                            </button>
                        </div>
                    </form>
                </section>
            @else
                <div class="rounded-xl border border-dashed border-brand-green/20 bg-white px-6 py-10 text-center text-sm text-brand-muted shadow-sm">
                    {{ __('No page sections are available yet.') }}
                </div>
            @endif
        </div>
    </div>
</div>