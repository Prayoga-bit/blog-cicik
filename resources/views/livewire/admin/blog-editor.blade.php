<div class="space-y-6 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            @if ($deletedPostId)
                <div class="rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                    Blog #{{ $deletedPostId }} berhasil dihapus.
                </div>
            @endif
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @forelse ($posts as $post)
                    <article class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm" wire:key="blog-post-{{ $post['id'] }}">
                        <div class="relative h-44 w-full bg-slate-100">
                            @if ($post['featured_image'])
                                <img src="{{ $post['featured_image'] }}" alt="{{ $post['title'] }}" class="h-full w-full object-cover" />
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-brand-light to-white text-sm text-brand-muted">
                                    No image
                                </div>
                            @endif

                            @if ($post['is_featured'])
                                <span class="absolute left-3 top-3 rounded-full bg-brand-yellow px-3 py-1 text-xs font-semibold uppercase tracking-wide text-brand-dark">Featured</span>
                            @endif
                        </div>

                        <div class="space-y-3 px-5 py-4">
                            <div class="space-y-1">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $post['title'] ?: 'Blog Post' }}
                                </h3>
                                <p class="text-xs text-gray-500">{{ $post['author_name'] }} · {{ $post['created_at'] ?? 'Draft' }}</p>
                            </div>

                            <p class="text-sm text-gray-600">
                                {{ $post['excerpt'] ?: 'No summary available yet.' }}
                            </p>

                            <div class="flex items-center justify-between pt-2">
                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                                    {{ $post['category'] ?: 'Uncategorized' }}
                                </span>

                                <div class="flex items-center gap-3">
                                    <a href="{{ route('blog-editor.edit', $post['id']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-green hover:text-brand-dark">
                                        Edit
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>

                                    <button
                                        type="button"
                                        class="inline-flex items-center gap-2 text-sm font-semibold text-red-600 hover:text-red-700"
                                        wire:click="deletePost({{ $post['id'] }})"
                                        wire:confirm="Hapus blog ini?"
                                    >
                                        Delete
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full rounded-lg border border-dashed border-gray-300 bg-white px-6 py-10 text-center text-sm text-gray-500">
                        No blog posts are available yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>