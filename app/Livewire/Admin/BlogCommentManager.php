<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class BlogCommentManager extends Component
{
    use WithPagination;

    public Blog $blog;
    public bool $isUserView = false;
    public ?string $statusMessage = null;

    public ?int $replyingTo = null;
    public string $replyText = '';

    public function mount(Blog $blog, bool $isUserView = false)
    {
        $this->blog = $blog;
        $this->isUserView = $isUserView;
    }

    public function setReply(?int $commentId)
    {
        $this->replyingTo = $commentId;
        $this->replyText = '';
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
        $this->statusMessage = "Reply posted successfully.";
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::where('blog_id', $this->blog->id)->find($commentId);

        if ($comment) {
            $comment->delete();
            $this->statusMessage = "Comment deleted successfully.";
        }
    }

    public function render()
    {
        $comments = Comment::where('blog_id', $this->blog->id)
            ->whereNull('parent_id')
            ->with(['user', 'replies.user'])
            ->latest()
            ->paginate(10);

        return view('livewire.admin.blog-comment-manager', [
            'comments' => $comments,
        ]);
    }
}
