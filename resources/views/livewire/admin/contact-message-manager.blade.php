<div
    x-data="{ showDeleteOverlay: false, deleteTargetId: null }"
    @keydown.escape.window="showDeleteOverlay = false; deleteTargetId = null"
    class="space-y-6 rounded-[32px] bg-brand-light/70 py-12 shadow-sm ring-1 ring-brand-green/5"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            <div class="rounded-2xl border border-brand-green/10 bg-white p-4 shadow-sm">
                <label for="message-search" class="mb-2 block text-sm font-semibold text-brand-dark">
                    Search messages
                </label>
                <input
                    id="message-search"
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search by name, email, or message"
                    class="block w-full rounded-lg border-brand-green/20 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                />
            </div>

            @if ($statusMessage)
                <div class="rounded-lg border border-brand-yellow/30 bg-brand-yellow/20 px-4 py-3 text-sm text-brand-dark">
                    {{ $statusMessage }}
                </div>
            @endif

            @forelse ($messages as $message)
                <section class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm" wire:key="contact-message-{{ $message->id }}">
                    <div class="border-b border-brand-green/5 px-6 py-4">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-base font-semibold text-brand-dark">{{ $message->name }}</h3>
                                <p class="text-sm text-brand-muted">{{ $message->email }}</p>
                            </div>
                            <div class="text-xs text-brand-gray">
                                {{ $message->created_at?->format('d M Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 px-6 py-6">
                        <div class="rounded-xl border border-brand-green/10 bg-brand-light/30 p-4 text-sm leading-relaxed text-brand-dark whitespace-pre-line">
                            {{ $message->message }}
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="button"
                                x-on:click="deleteTargetId = {{ $message->id }}; showDeleteOverlay = true"
                                class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-red-50 px-5 py-2 text-sm font-semibold text-red-700 transition hover:bg-red-100 hover:-translate-y-0.5"
                            >
                                <i class="fa-regular fa-trash-can"></i>
                                Delete Message
                            </button>
                        </div>
                    </div>
                </section>
            @empty
                <div class="rounded-xl border border-dashed border-brand-green/20 bg-white px-6 py-10 text-center text-sm text-brand-muted shadow-sm">
                    No contact messages found.
                </div>
            @endforelse

            @if ($messages->hasPages())
                <div class="rounded-2xl border border-brand-green/10 bg-white px-4 py-3 shadow-sm">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>

    <x-ui.delete-confirm-overlay
        confirm-action="deleteMessage"
        title="Delete this message?"
        message="This action cannot be undone. The contact message will be permanently deleted."
        aria-label="Delete contact message confirmation"
    />
</div>