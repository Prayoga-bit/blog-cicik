<div class="grid gap-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 md:p-8 text-gray-900">
            <p class="text-sm font-medium text-gray-500">
                {{ __('Welcome Back') }}
            </p>
            <h3 class="mt-1 text-2xl font-semibold text-gray-900">
                {{ $userName }}
            </h3>
            <p class="mt-2 text-sm text-gray-600">
                @if($isAdmin)
                    {{ __('Berikut ringkasan statistik keseluruhan blog dan gallery.') }}
                @else
                    {{ __('Berikut ringkasan statistik konten blog dan gallery milik Anda.') }}
                @endif
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
            <div class="p-6">
                <p class="text-sm font-medium text-gray-500">{{ __('Total Blog') }}</p>
                <p class="mt-3 text-4xl font-bold text-gray-900">{{ number_format($blogCount) }}</p>
                <a
                    href="{{ $isAdmin ? route('blog-editor') : route('user.blog-editor') }}"
                    class="mt-4 inline-flex text-sm font-medium text-indigo-600 hover:text-indigo-800"
                >
                    {{ __('Kelola blog') }}
                </a>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
            <div class="p-6">
                <p class="text-sm font-medium text-gray-500">{{ __('Total Gallery') }}</p>
                <p class="mt-3 text-4xl font-bold text-gray-900">{{ number_format($galleryCount) }}</p>
                <a
                    href="{{ $isAdmin ? route('gallery-editor') : route('user.gallery-editor') }}"
                    class="mt-4 inline-flex text-sm font-medium text-indigo-600 hover:text-indigo-800"
                >
                    {{ __('Kelola gallery') }}
                </a>
            </div>
        </div>
    </div>
</div>
