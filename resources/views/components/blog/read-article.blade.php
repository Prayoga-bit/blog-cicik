@props(['blog'])

@php
    $summary = \Illuminate\Support\Str::limit(strip_tags((string) $blog->content), 170);
@endphp

<article class="rounded-2xl bg-white p-6 shadow-[0_12px_20px_rgba(0,0,0,0.08)] md:p-12">
    <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-sm text-brand-muted transition hover:text-brand-dark md:text-base">
        <i class="fa-solid fa-arrow-left"></i>
        Back to All Posts
    </a>

    <div class="mt-8 space-y-8 text-brand-dark">
        <p class="max-w-4xl text-lg leading-relaxed text-brand-gray md:text-2xl md:leading-snug">
            {{ $summary }}
        </p>

        <section class="space-y-4">
            <h2 class="text-2xl font-bold md:text-4xl">Introduction</h2>
            <p class="text-base leading-8 md:text-lg">{{ strip_tags((string) $blog->content) }}</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-bold md:text-4xl">Key Takeaways</h2>
            <ul class="list-disc space-y-2 pl-6 text-base leading-8 md:text-lg">
                <li>Understand the market dynamics and how they affect your portfolio.</li>
                <li>Learn to identify potential risks before they become problems.</li>
                <li>Develop a long-term strategy that withstands short-term volatility.</li>
            </ul>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-bold md:text-4xl">The Strategic Approach</h2>
            <p class="text-base leading-8 md:text-lg">
                Successful investment planning requires balancing risk, timeline, and objectives. Build your plan with clear allocation targets,
                periodic rebalancing, and disciplined decision-making to navigate uncertainty.
            </p>
            <blockquote class="rounded-r-xl border-l-4 border-brand-yellow bg-slate-50 px-6 py-5 text-base italic leading-8 text-brand-gray md:text-lg">
                "Success in finance is not only about making the right moves, but making them at the right time with the right information."
            </blockquote>
            <p class="text-base leading-8 md:text-lg">
                Keep refining your assumptions, monitor macro indicators, and stay consistent with your long-term strategy.
            </p>
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
