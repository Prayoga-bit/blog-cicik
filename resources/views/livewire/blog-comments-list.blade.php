<div>
    <div class="mt-8 space-y-6">
        @forelse ($blog->comments as $comment)
            <x-blog.read-comment-item :comment="$comment" />
        @empty
            <p class="text-sm text-brand-muted">No comments yet for this article.</p>
        @endforelse
    </div>
</div>
