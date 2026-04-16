<div class="space-y-6 rounded-[32px] bg-brand-light/70 py-12 shadow-sm ring-1 ring-brand-green/5">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6">
            <div class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm">
                <div class="p-6 md:p-8 text-brand-dark">
                    <p class="text-sm font-medium text-brand-muted">
                        {{ __('Welcome Back') }}
                    </p>
                    <h3 class="mt-1 text-2xl font-semibold text-brand-dark">
                        {{ $userName }}
                    </h3>
                    <p class="mt-2 text-sm text-brand-gray">
                        @if($isAdmin)
                            {{ __('Berikut ringkasan statistik keseluruhan blog dan gallery.') }}
                        @else
                            {{ __('Berikut ringkasan statistik konten blog dan gallery milik Anda.') }}
                        @endif
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm">
                    <div class="p-6">
                        <p class="text-sm font-medium text-brand-muted">{{ __('Total Blog') }}</p>
                        <p class="mt-3 text-4xl font-bold text-brand-dark">{{ number_format($blogCount) }}</p>
                        <a
                            href="{{ $isAdmin ? route('blog-editor') : route('user.blog-editor') }}"
                            class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-brand-green transition hover:text-brand-dark"
                        >
                            {{ __('Kelola blog') }}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl border border-brand-green/10 bg-white shadow-sm">
                    <div class="p-6">
                        <p class="text-sm font-medium text-brand-muted">{{ __('Total Gallery') }}</p>
                        <p class="mt-3 text-4xl font-bold text-brand-dark">{{ number_format($galleryCount) }}</p>
                        <a
                            href="{{ $isAdmin ? route('gallery-editor') : route('user.gallery-editor') }}"
                            class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-brand-green transition hover:text-brand-dark"
                        >
                            {{ __('Kelola gallery') }}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
