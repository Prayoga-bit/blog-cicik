@props(['comments'])

@php
    $commentCollection = $comments;

    if ($commentCollection->isEmpty()) {
        $commentCollection = collect([
            [
                'name' => 'Alex Morgan',
                'email' => 'alex@example.com',
                'comment_text' => 'Great insights on market volatility! I completely agree with the points about diversification.',
                'created_at' => 'March 15, 2026',
            ],
            [
                'name' => 'Jamie Lee',
                'email' => 'jamie@example.com',
                'comment_text' => 'Could you elaborate more on the impact of interest rates mentioned in the second section?',
                'created_at' => 'March 16, 2026',
            ],
        ]);
    }
@endphp

<section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-[0_8px_20px_rgba(0,0,0,0.06)] md:p-12">
    <div class="flex items-center gap-3">
        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-brand-yellow text-brand-dark">
            <i class="fa-regular fa-message"></i>
        </span>
        <h3 class="text-2xl font-bold text-brand-dark md:text-4xl">Comments ({{ $commentCollection->count() }})</h3>
    </div>

    <form class="mt-8 rounded-2xl border border-gray-200 bg-slate-50 p-6" action="javascript:void(0)">
        <h4 class="text-lg font-bold text-brand-dark md:text-xl">Leave a Comment</h4>

        <label for="comment" class="mt-6 block text-sm font-medium text-brand-gray">
            Comment <span class="text-red-500">*</span>
        </label>
        <textarea
            id="comment"
            rows="6"
            placeholder="Share your thoughts about this article..."
            class="mt-2 w-full rounded-xl border-gray-200 text-sm text-brand-dark placeholder-brand-muted/70 focus:border-brand-green focus:ring-brand-green/20"
        ></textarea>

        <p class="mt-2 text-sm text-brand-muted">0 characters</p>

        <button
            type="submit"
            class="mt-4 inline-flex items-center gap-2 rounded-lg bg-brand-green px-5 py-2.5 text-sm font-medium text-white opacity-60"
            disabled
        >
            <i class="fa-regular fa-paper-plane"></i>
            Post Comment
        </button>
    </form>

    <div class="mt-8 space-y-6">
        @foreach ($commentCollection as $comment)
            <x-blog.read-comment-item :comment="$comment" />
        @endforeach
    </div>
</section>
