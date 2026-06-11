<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;

class BlogCommentsList extends Component
{
    public Blog $blog;
    public ?int $replyingTo = null;
    public string $replyText = '';
    public ?string $replySuccessMessage = null;

    #[On('refreshComments')]
    public function refreshComments()
    {
        $this->blog->load(['comments' => function ($query) {
            $query->whereNull('parent_id')->with(['replies' => function ($q) {
                $q->latest();
            }])->latest();
        }]);
    }

    public function setReply(?int $commentId)
    {
        $this->replyingTo = $commentId;
        $this->replyText = '';
        $this->replySuccessMessage = null;
    }

    public function submitReply($parentId)
    {
        $this->validate([
            'replyText' => ['required', 'string', 'min:3', 'max:1000'],
        ]);

        Comment::create([
            'blog_id' => $this->blog->id,
            'user_id' => auth()->id(),
            'comment_text' => trim($this->replyText),
            'parent_id' => $parentId,
        ]);

        $this->setReply(null);
        $this->replySuccessMessage = 'Reply posted successfully!';
        
        $this->refreshComments();
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::where('blog_id', $this->blog->id)->find($commentId);

        if ($comment && auth()->check() && $comment->user_id === auth()->id()) {
            $comment->delete();
            $this->replySuccessMessage = 'Comment deleted successfully!';
            $this->refreshComments();
        }
    }

    public function render()
    {
        if (!$this->blog->relationLoaded('comments')) {
            $this->refreshComments();
        }

        return view('livewire.blog-comments-list');
    }
}
