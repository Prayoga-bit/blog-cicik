<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::query()->first() ?? User::factory()->create([
            'name' => 'Editorial Team',
            'email' => 'editorial@example.com',
        ]);

        $posts = [
            [
                'title' => 'Understanding Market Volatility in 2026',
                'slug' => 'understanding-market-volatility-2026',
                'category' => 'Market Analysis',
                'featured_image' => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&q=80&w=1000',
                'content' => 'Discover the latest trends and strategies that can help elevate your financial portfolio in a volatile market environment.',
                'is_featured' => true,
            ],
            [
                'title' => 'The Golden Rule of Asset Allocation',
                'slug' => 'golden-rule-asset-allocation',
                'category' => 'Investment Strategy',
                'featured_image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?auto=format&fit=crop&q=80&w=1000',
                'content' => 'Learn how proper asset allocation can protect your wealth while maximizing returns over the long term.',
                'is_featured' => true,
            ],
            [
                'title' => 'Why Corporate Consulting Matters',
                'slug' => 'why-corporate-consulting-matters',
                'category' => 'Business',
                'featured_image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=1000',
                'content' => 'Explore the impact of professional consulting on corporate growth and efficiency in a competitive landscape.',
                'is_featured' => false,
            ],
            [
                'title' => 'Navigating Global Trade Regulations',
                'slug' => 'navigating-global-trade-regulations',
                'category' => 'Global Trade',
                'featured_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1000',
                'content' => 'A practical guide to understanding and complying with modern international trade regulations.',
                'is_featured' => false,
            ],
            [
                'title' => 'Sustainable Investing: A Future Trend',
                'slug' => 'sustainable-investing-future-trend',
                'category' => 'ESG',
                'featured_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=1000',
                'content' => 'How environmental, social, and governance factors are shaping modern investment strategies.',
                'is_featured' => false,
            ],
            [
                'title' => 'Technology in Financial Services',
                'slug' => 'technology-financial-services',
                'category' => 'Fintech',
                'featured_image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&q=80&w=1000',
                'content' => 'The role of artificial intelligence and digital infrastructure in transforming financial service operations.',
                'is_featured' => false,
            ],
            [
                'title' => 'Building Generational Wealth',
                'slug' => 'building-generational-wealth',
                'category' => 'Wealth Management',
                'featured_image' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&q=80&w=1000',
                'content' => 'Strategies and principles for creating lasting wealth that can benefit future generations through disciplined planning.',
                'is_featured' => false,
            ],
            [
                'title' => 'Emerging Markets Outlook 2026',
                'slug' => 'emerging-markets-outlook-2026',
                'category' => 'Market Analysis',
                'featured_image' => 'https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?auto=format&fit=crop&q=80&w=1000',
                'content' => 'An in-depth analysis of emerging market opportunities, macro risks, and sector-level momentum for the coming year.',
                'is_featured' => false,
            ],
            [
                'title' => 'Diversification in Uncertain Times',
                'slug' => 'diversification-uncertain-times',
                'category' => 'Investment Strategy',
                'featured_image' => 'https://images.unsplash.com/photo-1553729459-afe8f2e2ed08?auto=format&fit=crop&q=80&w=1000',
                'content' => 'Why diversifying your portfolio across multiple asset classes remains a critical defense in uncertain economic cycles.',
                'is_featured' => true,
            ],
            [
                'title' => 'Leadership in Financial Organizations',
                'slug' => 'leadership-financial-organizations',
                'category' => 'Business',
                'featured_image' => 'https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?auto=format&fit=crop&q=80&w=1000',
                'content' => 'How effective leadership culture drives execution quality, innovation, and long-term resilience in financial institutions.',
                'is_featured' => false,
            ],
            [
                'title' => 'Risk Management for New Investors',
                'slug' => 'risk-management-for-new-investors',
                'category' => 'Risk Management',
                'featured_image' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&q=80&w=1000',
                'content' => 'A practical framework to identify, measure, and control risk before expanding your investment exposure.',
                'is_featured' => false,
            ],
            [
                'title' => 'How to Read Company Financial Statements',
                'slug' => 'how-to-read-company-financial-statements',
                'category' => 'Financial Literacy',
                'featured_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=1000',
                'content' => 'Understand balance sheets, income statements, and cash flow reports to make more informed investment decisions.',
                'is_featured' => false,
            ],
            [
                'title' => 'Macro Trends That Move Asset Prices',
                'slug' => 'macro-trends-that-move-asset-prices',
                'category' => 'Macro Economics',
                'featured_image' => 'https://images.unsplash.com/photo-1460472178825-e5240623afd5?auto=format&fit=crop&q=80&w=1000',
                'content' => 'From inflation to interest rate cycles, learn the macro indicators that influence equities, bonds, and commodities.',
                'is_featured' => false,
            ],
            [
                'title' => 'Client Portfolio Rebalancing Playbook',
                'slug' => 'client-portfolio-rebalancing-playbook',
                'category' => 'Portfolio Management',
                'featured_image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1000',
                'content' => 'A step-by-step rebalancing approach used by advisory teams to keep portfolios aligned with target risk profiles.',
                'is_featured' => false,
            ],
            [
                'title' => 'Practical Cash Flow Planning for SMEs',
                'slug' => 'practical-cash-flow-planning-for-smes',
                'category' => 'Business Finance',
                'featured_image' => 'https://images.unsplash.com/photo-1556155092-490a1ba16284?auto=format&fit=crop&q=80&w=1000',
                'content' => 'Cash flow planning tips for small and medium businesses to improve resilience and support sustainable expansion.',
                'is_featured' => false,
            ],
        ];

        foreach ($posts as $post) {
            Blog::updateOrCreate(
                ['slug' => $post['slug']],
                [
                    'title' => $post['title'],
                    'content' => $post['content'],
                    'category' => $post['category'],
                    'featured_image' => $post['featured_image'],
                    'is_featured' => $post['is_featured'],
                    'author_id' => $author->id,
                ]
            );
        }
    }
}