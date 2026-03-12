<?php

namespace Database\Seeders;

use App\Models\ProjectArea;
use Illuminate\Database\Seeder;

class ProjectAreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            [
                'title'       => 'Gold Investment',
                'description' => 'Secure your future with tangible assets. We provide expert guidance on gold market trends and acquisition.',
                'icon_url'    => 'fa-solid fa-arrow-trend-up',
                'image_url'   => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title'       => 'Forex Trading',
                'description' => 'Navigate the global currency markets with our professional trading strategies and risk management tools.',
                'icon_url'    => 'fa-solid fa-chart-column',
                'image_url'   => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title'       => 'Risk Management',
                'description' => 'Comprehensive insurance and protection plans to safeguard your wealth against unforeseen circumstances.',
                'icon_url'    => 'fa-solid fa-shield-halved',
                'image_url'   => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title'       => 'Strategic Consulting',
                'description' => 'Tailored business and financial advice to help you reach your corporate and personal goals.',
                'icon_url'    => 'fa-solid fa-chart-pie',
                'image_url'   => 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=800&auto=format&fit=crop',
            ],
        ];

        foreach ($areas as $area) {
            ProjectArea::updateOrCreate(
                ['title' => $area['title']],
                ['description' => $area['description'], 'icon_url' => $area['icon_url'], 'image_url' => $area['image_url']]
            );
        }
    }
}
