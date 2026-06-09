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

    public function mount(Blog $blog, bool $isUserView = false)
    {
        $this->blog = $blog;
        $this->isUserView = $isUserView;
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
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.blog-comment-manager', [
            'comments' => $comments,
        ]);
    }
}
