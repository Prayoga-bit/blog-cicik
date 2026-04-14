<div class="space-y-6 rounded-[32px] bg-brand-light/70 py-12 shadow-sm ring-1 ring-brand-green/5">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-6 space-y-4">
            @if ($statusMessage)
                <div class="rounded-lg border border-brand-yellow/30 bg-brand-yellow/20 px-4 py-3 text-sm text-brand-dark">
                    {{ $statusMessage }}
                </div>
            @endif

            @if ($deletedItemId)
                <div class="rounded-lg border border-brand-green/20 bg-white px-4 py-3 text-sm text-brand-dark shadow-sm">
                    Gallery #{{ $deletedItemId }} berhasil dihapus.
                </div>
            @endif

            <div class="flex justify-end">
                <a
                    href="{{ $isUserView ? route('user.gallery-editor.create') : route('gallery-editor.create') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-brand-green px-4 py-2 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-brand-dark"
                >
                    <i class="fa-solid fa-plus"></i>
                    Add Gallery
                </a>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($items as $item)
                <article class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm transition-shadow duration-200 hover:shadow-md" wire:key="gallery-item-{{ $item['id'] }}">
                    <div class="relative h-48 w-full bg-slate-100">
                        @if ($item['image_url'])
                            <img src="{{ $item['image_url'] }}" alt="{{ $item['title'] ?: 'Gallery image' }}" loading="lazy" class="h-full w-full object-cover" />
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-brand-light to-white text-sm text-brand-muted">
                                No image
                            </div>
                        @endif

                        <span class="absolute right-3 top-3 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-brand-dark shadow-sm">
                            #{{ $item['id'] }}
                        </span>
                    </div>

                    <div class="space-y-3 px-5 py-4">
                        <div class="space-y-1">
                            <h3 class="text-lg font-semibold text-brand-dark">
                                {{ $item['title'] ?: 'Gallery Item' }}
                            </h3>
                            <p class="text-xs text-brand-muted">{{ $item['author_name'] }} · {{ $item['created_at'] ?? 'Draft' }}</p>
                        </div>

                        <p class="text-sm text-brand-gray">
                            {{ $item['description_excerpt'] ?: 'No description available yet.' }}
                        </p>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ $isUserView ? route('user.gallery-editor.edit', $item['id']) : route('gallery-editor.edit', $item['id']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-green transition hover:text-brand-dark">
                                Edit
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                            <button
                                type="button"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-red-600 transition hover:text-red-700"
                                wire:click="deleteItem({{ $item['id'] }})"
                                wire:confirm="Hapus gallery ini?"
                            >
                                Delete
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-lg border border-dashed border-brand-green/20 bg-white px-6 py-10 text-center text-sm text-brand-muted shadow-sm">
                    No gallery items are available yet.
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            <x-ui.pagination :paginator="$items" />
        </div>
    </div>
</div>