<?php

namespace App\Livewire\Blog;

use Livewire\Component;
use Livewire\WithPagination;

class BlogGrid extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 6;

    protected $queryString = ['search'];

    // Mock data for blog posts
    private function getBlogPosts(): array
    {
        return [
            [
                'image' => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&q=80&w=800',
                'category' => 'Market Analysis',
                'date' => 'March 15, 2026',
                'title' => 'Understanding Market Volatility in 2026',
                'description' => 'Discover the latest trends and strategies that can help elevate your financial portfolio to the next level in a volatile market.',
                'author' => 'Sarah Johnson',
                'slug' => 'understanding-market-volatility-2026',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?auto=format&fit=crop&q=80&w=800',
                'category' => 'Investment Strategy',
                'date' => 'March 10, 2026',
                'title' => 'The Golden Rule of Asset Allocation',
                'description' => 'Learn how proper asset allocation can protect your wealth while maximizing returns over the long term.',
                'author' => 'Michael Chen',
                'slug' => 'golden-rule-asset-allocation',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=800',
                'category' => 'Business',
                'date' => 'March 5, 2026',
                'title' => 'Why Corporate Consulting Matters',
                'description' => "Explore the impact of professional consulting on corporate growth and efficiency in today's competitive landscape.",
                'author' => 'Emma Williams',
                'slug' => 'why-corporate-consulting-matters',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800',
                'category' => 'Global Trade',
                'date' => 'February 28, 2026',
                'title' => 'Navigating Global Trade Regulations',
                'description' => 'A comprehensive guide to understanding and complying with the latest international trade regulations.',
                'author' => 'James Wilson',
                'slug' => 'navigating-global-trade-regulations',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=800',
                'category' => 'ESG',
                'date' => 'February 20, 2026',
                'title' => 'Sustainable Investing: A Future Trend',
                'description' => 'How environmental, social, and governance factors are shaping the future of investment strategies.',
                'author' => 'Sophia Martinez',
                'slug' => 'sustainable-investing-future-trend',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&q=80&w=800',
                'category' => 'Fintech',
                'date' => 'February 15, 2026',
                'title' => 'Technology in Financial Services',
                'description' => 'The role of artificial intelligence and blockchain in revolutionizing the financial services industry.',
                'author' => 'David Lee',
                'slug' => 'technology-financial-services',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&q=80&w=800',
                'category' => 'Wealth Management',
                'date' => 'February 10, 2026',
                'title' => 'Building Generational Wealth',
                'description' => 'Strategies and principles for creating lasting wealth that can benefit future generations.',
                'author' => 'Sarah Johnson',
                'slug' => 'building-generational-wealth',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?auto=format&fit=crop&q=80&w=800',
                'category' => 'Market Analysis',
                'date' => 'February 5, 2026',
                'title' => 'Emerging Markets Outlook 2026',
                'description' => 'An in-depth analysis of emerging market opportunities and risks for the coming year.',
                'author' => 'Michael Chen',
                'slug' => 'emerging-markets-outlook-2026',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1553729459-afe8f2e2ed08?auto=format&fit=crop&q=80&w=800',
                'category' => 'Investment Strategy',
                'date' => 'January 28, 2026',
                'title' => 'Diversification in Uncertain Times',
                'description' => 'Why diversifying your portfolio is more important than ever in the current economic climate.',
                'author' => 'Emma Williams',
                'slug' => 'diversification-uncertain-times',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?auto=format&fit=crop&q=80&w=800',
                'category' => 'Business',
                'date' => 'January 20, 2026',
                'title' => 'Leadership in Financial Organizations',
                'description' => 'How effective leadership drives success and innovation in financial institutions.',
                'author' => 'James Wilson',
                'slug' => 'leadership-financial-organizations',
            ],
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $allPosts = collect($this->getBlogPosts());

        if ($this->search) {
            $search = mb_strtolower($this->search);
            $allPosts = $allPosts->filter(function ($post) use ($search) {
                return str_contains(mb_strtolower($post['title']), $search)
                    || str_contains(mb_strtolower($post['category']), $search)
                    || str_contains(mb_strtolower($post['author']), $search)
                    || str_contains(mb_strtolower($post['description']), $search);
            });
        }

        $total = $allPosts->count();
        $currentPage = $this->getPage();
        $lastPage = max(1, (int) ceil($total / $this->perPage));

        if ($currentPage > $lastPage) {
            $currentPage = $lastPage;
            $this->setPage($currentPage);
        }

        $posts = $allPosts->slice(($currentPage - 1) * $this->perPage, $this->perPage)->values();

        return view('livewire.blog.blog-grid', [
            'posts' => $posts,
            'currentPage' => $currentPage,
            'lastPage' => $lastPage,
            'total' => $total,
        ]);
    }
}
