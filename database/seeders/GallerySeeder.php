<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::query()->first() ?? User::factory()->create([
            'name' => 'Gallery Curator',
            'email' => 'gallery@example.com',
        ]);

        $galleries = [
            [
                'title' => 'Quarterly Portfolio Review',
                'description' => 'A focused review session where the advisory team aligned portfolio strategy with current market movement.',
                'image_url' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Client Strategy Session',
                'description' => 'An interactive consultation discussing long-term asset protection, growth scenarios, and execution planning.',
                'image_url' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Financial Reporting Desk',
                'description' => 'Daily reporting and performance tracking to support sharper investment decisions across key accounts.',
                'image_url' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Market Trend Analysis',
                'description' => 'Our internal market review process for identifying trend shifts and protecting downside exposure.',
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Investment Briefing',
                'description' => 'A snapshot from an investment briefing focused on macroeconomic signals and asset rotation.',
                'image_url' => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Leadership Alignment',
                'description' => 'Cross-functional discussion to align operations, client service, and investment priorities.',
                'image_url' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Advisory Whiteboard Session',
                'description' => 'A workshop moment where the team broke down client goals into measurable action plans.',
                'image_url' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Collaborative Planning',
                'description' => 'An open planning session covering growth opportunities, risk tolerance, and portfolio balancing.',
                'image_url' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Executive Discussion',
                'description' => 'Leadership discussion around capital strategy and investor communication for the next quarter.',
                'image_url' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Data-Driven Planning',
                'description' => 'Reviewing dashboards, market indicators, and operational data to sharpen next-step recommendations.',
                'image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Investor Presentation Prep',
                'description' => 'Preparation for an investor-facing presentation with emphasis on clarity, confidence, and measurable outcomes.',
                'image_url' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1000',
            ],
            [
                'title' => 'Planning Table Review',
                'description' => 'Capturing a detail-oriented review session where options were assessed and priorities finalized.',
                'image_url' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&q=80&w=1000',
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(
                ['title' => $gallery['title']],
                [
                    'description' => $gallery['description'],
                    'image_url' => $gallery['image_url'],
                    'user_id' => $user->id,
                ]
            );
        }
    }
}