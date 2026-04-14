@props([
    'showVar' => 'showDeleteOverlay',
    'targetVar' => 'deleteTargetId',
    'title' => 'Hapus data ini?',
    'message' => 'Tindakan ini tidak bisa dibatalkan. Data akan dihapus permanen.',
    'confirmAction',
    'confirmLabel' => 'Ya, Hapus',
    'cancelLabel' => 'Batal',
    'ariaLabel' => 'Konfirmasi hapus data',
])

<div
    x-cloak
    x-show="{{ $showVar }}"
    x-transition.opacity
    class="fixed inset-0 z-50 !mt-0 flex items-center justify-center px-4"
    role="dialog"
    aria-modal="true"
    aria-label="{{ $ariaLabel }}"
>
    <div class="absolute inset-0 bg-brand-dark/20" x-on:click="{{ $showVar }} = false; {{ $targetVar }} = null"></div>

    <div class="relative w-full max-w-md rounded-2xl border border-red-200 bg-white p-6 shadow-xl">
        <div class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-full bg-red-100 text-red-600">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>

        <h3 class="text-lg font-semibold text-brand-dark">{{ $title }}</h3>
        <p class="mt-2 text-sm text-brand-gray">{{ $message }}</p>

        <div class="mt-6 flex items-center justify-end gap-3">
            <button
                type="button"
                class="rounded-full border border-brand-green/20 px-4 py-2 text-sm font-semibold text-brand-dark transition hover:bg-brand-light"
                x-on:click="{{ $showVar }} = false; {{ $targetVar }} = null"
            >
                {{ $cancelLabel }}
            </button>
            <button
                type="button"
                class="rounded-full bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700"
                x-on:click="$wire.{{ $confirmAction }}({{ $targetVar }}); {{ $showVar }} = false; {{ $targetVar }} = null"
            >
                {{ $confirmLabel }}
            </button>
        </div>
    </div>
</div>