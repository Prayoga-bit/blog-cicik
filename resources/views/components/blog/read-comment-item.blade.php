@props(['comment'])

@php
    $user = is_array($comment) ? null : $comment->user;
    $name = is_array($comment) ? ($comment['name'] ?? 'Guest') : ($user?->name ?? 'Guest');
    $email = is_array($comment) ? ($comment['email'] ?? 'guest@example.com') : ($user?->email ?? 'guest@example.com');
    $message = is_array($comment) ? ($comment['comment_text'] ?? '') : ($comment->comment_text ?? '');
    $date = is_array($comment)
        ? ($comment['created_at'] ?? now()->toDateString())
        : ($comment->created_at?->format('F j, Y') ?? now()->format('F j, Y'));
    $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=ebf16b&color=1a1a1a';
@endphp

<div class="flex items-start gap-4 border-b border-gray-100 pb-6 last:border-b-0 last:pb-0">
    <img src="{{ $avatarUrl }}" alt="{{ $name }}" class="h-12 w-12 rounded-full border-2 border-brand-yellow object-cover shadow-sm" />

    <div class="flex-1">
        <div class="flex flex-wrap items-start justify-between gap-2">
            <div>
                <h4 class="text-lg font-bold text-brand-dark">{{ $name }}</h4>
                <p class="text-sm text-brand-muted">{{ $email }}</p>
            </div>
            <span class="text-sm text-brand-muted/70">{{ $date }}</span>
        </div>

        <p class="mt-2 text-base leading-relaxed text-brand-gray">
            {{ $message }}
        </p>
    </div>
</div>
