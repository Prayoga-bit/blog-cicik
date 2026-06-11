<div class="space-y-6">
    @if ($statusMessage)
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ $statusMessage }}
        </div>
    @endif

    <div class="rounded-2xl border border-brand-green/10 bg-white p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-brand-dark">Comments ({{ $comments->total() }})</h3>
        
        <div class="space-y-4">
            @forelse ($comments as $comment)
                <div class="rounded-lg border border-gray-100 bg-gray-50 p-4">
                    <div class="flex items-start justify-between gap-4">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-900">{{ $comment->user->name ?? 'Unknown User' }}</span>
                                <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm text-gray-700">{{ $comment->comment_text }}</p>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <button 
                                type="button" 
                                wire:click="setReply({{ $comment->id }})"
                                class="text-sm font-semibold text-brand-green transition hover:text-brand-dark"
                            >
                                Reply
                            </button>
                            <button 
                                type="button" 
                                wire:click="deleteComment({{ $comment->id }})"
                                wire:confirm="Are you sure you want to delete this comment?"
                                class="text-sm font-semibold text-red-600 transition hover:text-red-700"
                            >
                                Delete
                            </button>
                        </div>
                    </div>

                    @if($replyingTo === $comment->id)
                        <form wire:submit="submitReply({{ $comment->id }})" class="mt-4 rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
                            <textarea
                                wire:model="replyText"
                                rows="3"
                                placeholder="Type your reply..."
                                class="w-full rounded-lg border-gray-300 text-sm focus:border-brand-green focus:ring-brand-green"
                            ></textarea>
                            @error('replyText') <span class="mt-1 block text-xs text-red-500">{{ $message }}</span> @enderror
                            <div class="mt-2 flex justify-end gap-2">
                                <button type="button" wire:click="setReply(null)" class="rounded-lg px-3 py-1.5 text-xs font-medium text-gray-500 hover:bg-gray-100">Cancel</button>
                                <button type="submit" class="rounded-lg bg-brand-green px-3 py-1.5 text-xs font-medium text-white hover:opacity-90">Post Reply</button>
                            </div>
                        </form>
                    @endif

                    @if($comment->replies && $comment->replies->count() > 0)
                        <div class="ml-8 mt-4 space-y-3 border-l-2 border-brand-green/20 pl-4">
                            @foreach($comment->replies as $reply)
                                <div class="rounded-lg border border-gray-100 bg-white p-3">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-2">
                                                <span class="font-medium text-gray-900">{{ $reply->user->name ?? 'Unknown User' }}</span>
                                                <span class="rounded bg-gray-100 px-1.5 py-0.5 text-[10px] font-semibold uppercase text-gray-500">Reply</span>
                                                <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="text-sm text-gray-700">{{ $reply->comment_text }}</p>
                                        </div>
                                        
                                        <button 
                                            type="button" 
                                            wire:click="deleteComment({{ $reply->id }})"
                                            wire:confirm="Are you sure you want to delete this reply?"
                                            class="text-xs font-semibold text-red-600 transition hover:text-red-700"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <div class="rounded-lg border border-dashed border-gray-200 p-8 text-center text-sm text-gray-500">
                    No comments found for this blog post.
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $comments->links() }}
        </div>
    </div>
</div>
