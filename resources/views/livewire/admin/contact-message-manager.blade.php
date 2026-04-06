<div class="space-y-6 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
                <label for="message-search" class="mb-2 block text-sm font-medium text-gray-700">
                    Search messages
                </label>
                <input
                    id="message-search"
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search by name, email, or message"
                    class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                />
            </div>

            @if ($statusMessage)
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ $statusMessage }}
                </div>
            @endif

            @forelse ($messages as $message)
                <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm" wire:key="contact-message-{{ $message->id }}">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-base font-semibold text-gray-900">{{ $message->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $message->email }}</p>
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $message->created_at?->format('d M Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 px-6 py-6">
                        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 text-sm leading-relaxed text-gray-700 whitespace-pre-line">
                            {{ $message->message }}
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="button"
                                wire:click="deleteMessage({{ $message->id }})"
                                wire:confirm="Delete this message?"
                                class="inline-flex items-center rounded-lg border border-red-200 bg-red-50 px-4 py-2 text-sm font-semibold text-red-700 transition hover:bg-red-100"
                            >
                                Delete Message
                            </button>
                        </div>
                    </div>
                </section>
            @empty
                <div class="rounded-lg border border-dashed border-gray-300 bg-white px-6 py-10 text-center text-sm text-gray-500">
                    No contact messages found.
                </div>
            @endforelse

            @if ($messages->hasPages())
                <div class="rounded-xl border border-gray-200 bg-white px-4 py-3 shadow-sm">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>
</div>