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
                <div class="flex items-start justify-between gap-4 rounded-lg border border-gray-100 bg-gray-50 p-4">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <span class="font-medium text-gray-900">{{ $comment->user->name ?? 'Unknown User' }}</span>
                            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-gray-700">{{ $comment->comment_text }}</p>
                    </div>
                    
                    <button 
                        type="button" 
                        wire:click="deleteComment({{ $comment->id }})"
                        wire:confirm="Are you sure you want to delete this comment?"
                        class="text-sm font-semibold text-red-600 transition hover:text-red-700"
                    >
                        Delete
                    </button>
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
