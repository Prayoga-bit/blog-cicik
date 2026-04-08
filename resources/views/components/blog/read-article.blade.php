@props(['blog'])

<article class="rounded-2xl bg-white p-6 shadow-[0_12px_20px_rgba(0,0,0,0.08)] md:p-12">
    <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-sm text-brand-muted transition hover:text-brand-dark md:text-base">
        <i class="fa-solid fa-arrow-left"></i>
        Back to All Posts
    </a>

    <div class="mt-8 space-y-8 text-brand-dark">

        <section class="blog-rich-text text-base leading-8 md:text-lg">
            {!! $blog->content !!}
        </section>
    </div>

    <div class="mt-10 flex flex-wrap items-center justify-between gap-4 border-t border-gray-100 pt-6">
        <span class="inline-flex items-center gap-2 text-base font-semibold text-brand-dark">
            <i class="fa-solid fa-share-nodes text-sm"></i>
            Share this article
        </span>
        <div class="flex items-center gap-3">
            <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-brand-dark transition hover:bg-brand-yellow">
                <i class="fa-brands fa-facebook-f text-sm"></i>
            </button>
            <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-brand-dark transition hover:bg-brand-yellow">
                <i class="fa-brands fa-twitter text-sm"></i>
            </button>
            <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-brand-dark transition hover:bg-brand-yellow">
                <i class="fa-brands fa-linkedin-in text-sm"></i>
            </button>
        </div>
    </div>
</article>
