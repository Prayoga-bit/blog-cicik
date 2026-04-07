<?php

namespace App\Livewire\Blog;

use App\Services\BlogService;
use Livewire\Component;
use Livewire\WithPagination;

class BlogGrid extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 6;
    public $searchPlaceholder = 'Search articles...';
    public $emptyTitle = 'No articles found.';
    public $emptySubtitle = 'Try adjusting your search terms.';

    protected $queryString = ['search'];
    private BlogService $blogService;

    public function boot(BlogService $blogService): void
    {
        $this->blogService = $blogService;
    }

    public function mount(
        string $searchPlaceholder = 'Search articles...',
        string $emptyTitle = 'No articles found.',
        string $emptySubtitle = 'Try adjusting your search terms.'
    ): void
    {
        $this->searchPlaceholder = $searchPlaceholder;
        $this->emptyTitle = $emptyTitle;
        $this->emptySubtitle = $emptySubtitle;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $currentPage = $this->getPage();
        $paginator = $this->blogService->paginateForGrid($this->search, $this->perPage, $currentPage);

        if ($paginator->lastPage() > 0 && $currentPage > $paginator->lastPage()) {
            $this->setPage($paginator->lastPage());
            $paginator = $this->blogService->paginateForGrid($this->search, $this->perPage, $this->getPage());
        }

        return view('livewire.blog.blog-grid', [
            'posts' => $paginator,
        ]);
    }
}
