<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Comment;
use Livewire\Component;

class BlogCommentForm extends Component
{
    public Blog $blog;
    public string $comment_text = '';
    public ?string $successMessage = null;

    public function rules(): array
    {
        return [
            'comment_text' => ['required', 'string', 'min:3', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'comment_text.required' => 'Comment cannot be empty.',
            'comment_text.min' => 'Comment must be at least 3 characters.',
            'comment_text.max' => 'Comment cannot exceed 1000 characters.',
        ];
    }

    public function submitComment()
    {
        $this->validate();

        Comment::create([
            'blog_id' => $this->blog->id,
            'user_id' => auth()->id(),
            'comment_text' => trim($this->comment_text),
        ]);

        $this->comment_text = '';
        $this->successMessage = 'Comment posted successfully!';

        // Dispatch event to refresh all comment lists
        $this->dispatch('refreshComments');
    }

    public function render()
    {
        return view('livewire.blog-comment-form');
    }
}
