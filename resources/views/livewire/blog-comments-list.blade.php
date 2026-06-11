<div x-data="{ showMessage: true, showDeleteOverlay: false, deleteTargetId: null }" @keydown.escape.window="showDeleteOverlay = false; deleteTargetId = null" x-effect="if ($wire.replySuccessMessage) { showMessage = true; setTimeout(() => showMessage = false, 3000); }">
    <div class="mt-8 space-y-8">
        @if($replySuccessMessage)
            <div class="rounded-lg border-l-4 border-green-500 bg-green-50 p-4 text-green-700" x-show="showMessage" x-transition>
                <p class="text-sm font-medium">{{ $replySuccessMessage }}</p>
            </div>
        @endif

        @forelse ($blog->comments as $comment)
            <div class="space-y-3">
                <x-blog.read-comment-item :comment="$comment" />
                
                <div class="ml-16 flex gap-3">
                    @auth
                        <button wire:click="setReply({{ $comment->id }})" class="text-xs font-semibold text-brand-green transition hover:text-brand-dark">
                            Reply
                        </button>
                        
                        @if(auth()->id() === $comment->user_id)
                            <button type="button" x-on:click="deleteTargetId = {{ $comment->id }}; showDeleteOverlay = true" class="text-xs font-semibold text-red-600 transition hover:text-red-700">
                                Delete
                            </button>
                        @endif
                    @endauth
                </div>

                <div class="ml-16">
                    @if($replyingTo === $comment->id)
                        <form wire:submit="submitReply({{ $comment->id }})" class="mt-3 rounded-xl border border-gray-200 bg-slate-50 p-4">
                            <textarea
                                wire:model="replyText"
                                rows="3"
                                placeholder="Write your reply..."
                                class="w-full rounded-lg border-gray-200 text-sm focus:border-brand-green focus:ring-brand-green/20"
                            ></textarea>
                            @error('replyText') <span class="mt-1 block text-xs text-red-500">{{ $message }}</span> @enderror
                            <div class="mt-2 flex justify-end gap-2">
                                <button type="button" wire:click="setReply(null)" class="rounded-lg px-3 py-1.5 text-xs font-medium text-gray-500 transition hover:bg-gray-200">Cancel</button>
                                <button type="submit" class="rounded-lg bg-brand-green px-3 py-1.5 text-xs font-medium text-white transition hover:bg-brand-dark">Post Reply</button>
                            </div>
                        </form>
                    @endif
                </div>

                @if($comment->replies && $comment->replies->count() > 0)
                    <div class="ml-16 mt-4 space-y-4 border-l-2 border-gray-200 pl-4">
                        @foreach($comment->replies as $reply)
                            <div class="pb-2">
                                <x-blog.read-comment-item :comment="$reply" />
                                
                                @auth
                                    @if(auth()->id() === $reply->user_id)
                                        <div class="ml-16 mt-1">
                                            <button type="button" x-on:click="deleteTargetId = {{ $reply->id }}; showDeleteOverlay = true" class="text-xs font-semibold text-red-600 transition hover:text-red-700">
                                                Delete
                                            </button>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <p class="text-sm text-brand-muted">No comments yet for this article.</p>
        @endforelse
    </div>

    <x-ui.delete-confirm-overlay
        confirm-action="deleteComment"
        title="Delete this comment?"
        message="Are you sure you want to delete this comment? This action cannot be undone."
        aria-label="Confirm delete comment"
    />
</div>
