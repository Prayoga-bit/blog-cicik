@props(['blog'])

<section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-[0_8px_20px_rgba(0,0,0,0.06)] md:p-12">
    <div class="flex items-center gap-3">
        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-brand-yellow text-brand-dark">
            <i class="fa-regular fa-message"></i>
        </span>
        <h3 class="text-2xl font-bold text-brand-dark md:text-4xl">Comments ({{ $blog->comments->count() }})</h3>
    </div>

    <div class="mt-8">
        <livewire:blog-comment-form :blog="$blog" />
    </div>

    <livewire:blog-comments-list :blog="$blog" />
</section>
