<div x-data="{ showMessage: false, successMessage: @entangle('successMessage'), commentText: @entangle('comment_text') }"
    x-effect="if (successMessage) { showMessage = true; setTimeout(() => showMessage = false, 3000); }">
    @auth
        <div class="rounded-2xl border border-gray-200 bg-slate-50 p-6">
            <h4 class="text-lg font-bold text-brand-dark md:text-xl">Leave a Comment</h4>

            @if ($successMessage)
                <div class="mt-4 rounded-lg border-l-4 border-green-500 bg-green-50 p-4 text-green-700" x-show="showMessage" x-transition>
                    <p class="text-sm font-medium">{{ $successMessage }}</p>
                </div>
            @endif

            <form wire:submit="submitComment" class="mt-6">
                <label for="comment" class="block text-sm font-medium text-brand-gray">
                    Comment <span class="text-red-500">*</span>
                </label>
                <textarea
                    id="comment"
                    wire:model="comment_text"
                    rows="6"
                    placeholder="Share your thoughts about this article..."
                    class="mt-2 w-full rounded-xl border-gray-200 text-sm text-brand-dark placeholder-brand-muted/70 focus:border-brand-green focus:ring-brand-green/20"
                ></textarea>

                @error('comment_text')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="mt-2 flex items-center justify-between">
                    <p class="text-sm text-brand-muted" x-text="(commentText?.length || 0) + ' / 1000 characters'"></p>
                </div>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="mt-4 inline-flex items-center gap-2 rounded-lg bg-brand-green px-5 py-2.5 text-sm font-medium text-white transition-opacity hover:opacity-90 disabled:opacity-50"
                >
                    <span wire:loading.remove>
                        <i class="fa-regular fa-paper-plane"></i>
                        Post Comment
                    </span>
                    <span wire:loading>
                        <i class="fa-solid fa-spinner animate-spin"></i>
                        Posting...
                    </span>
                </button>
            </form>
        </div>
    @else
        <div class="rounded-2xl border border-gray-200 bg-slate-50 p-6 text-center">
            <p class="text-brand-gray">
                <a href="{{ route('login') }}" wire:navigate class="font-medium text-brand-green hover:underline">Sign in</a>
                to leave a comment.
            </p>
        </div>
    @endauth
</div>
