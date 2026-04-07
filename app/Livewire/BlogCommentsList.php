<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\On;

class BlogCommentsList extends Component
{
    public Blog $blog;

    #[On('refreshComments')]
    public function refreshComments()
    {
        $this->blog->load(['comments' => fn ($query) => $query->latest()]);
    }

    public function render()
    {
        return view('livewire.blog-comments-list');
    }
}
