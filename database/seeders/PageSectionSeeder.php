<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class PageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [

            // ── Hero ─────────────────────────────────────────────────────────
            [
                'page_name'   => 'home',
                'section_key' => 'hero_title',
                'content'     => 'Smart Strategi for Managing Your Futures Assets',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'hero_subtitle',
                'content'     => 'Professional assistance for managing gold, forex, and other trading instruments',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'hero_button_label',
                'content'     => 'Explore More',
                'image_url'   => null,
            ],

            // ── Who We Are ───────────────────────────────────────────────────
            [
                'page_name'   => 'home',
                'section_key' => 'who_badge',
                'content'     => 'WHO WE ARE',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_title_line1',
                'content'     => 'Empowering Financial Future:',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_title_line2',
                'content'     => 'Investing in Success',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_description',
                'content'     => 'We provide expert advice and assistance for managing your financial assets. Our team of dedicated professionals ensures that your investment portfolio is optimized for growth while minimizing risks.',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_check_1',
                'content'     => 'Top Financial Strategy',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_check_2',
                'content'     => 'Profit Max Solutions',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_check_3',
                'content'     => 'Guest to Advisory',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_check_4',
                'content'     => 'Risk Free Curve',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_image',
                'content'     => 'Corporate advisory meeting',
                'image_url'   => 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=1000&auto=format&fit=crop',
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_card_title',
                'content'     => 'Risk Management Plan',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'who_card_text',
                'content'     => 'Comprehensive strategies to protect your assets and ensure long-term stability.',
                'image_url'   => null,
            ],

            // ── Stats ────────────────────────────────────────────────────────
            [
                'page_name'   => 'home',
                'section_key' => 'stat_client_retention',
                'content'     => '95%',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'stat_client_retention_label',
                'content'     => 'Client Retention',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'stat_business_growth',
                'content'     => '98%',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'stat_business_growth_label',
                'content'     => 'Business Growth',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'stat_average_rating',
                'content'     => '5.00',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'stat_average_rating_label',
                'content'     => 'Average Rating',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'stat_happy_clients',
                'content'     => '10k+',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'stat_happy_clients_label',
                'content'     => 'Happy Clients',
                'image_url'   => null,
            ],

            // ── Latest Insights ──────────────────────────────────────────────
            [
                'page_name'   => 'home',
                'section_key' => 'insights_title',
                'content'     => 'Latest Insights',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'insights_view_all_label',
                'content'     => 'View All Posts',
                'image_url'   => null,
            ],

            // ── Practice Areas ───────────────────────────────────────────────
            [
                'page_name'   => 'home',
                'section_key' => 'practice_title',
                'content'     => 'Our Practice Areas',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'practice_subtitle',
                'content'     => 'Specialized financial services designed to maximize your potential.',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'home',
                'section_key' => 'practice_view_all_label',
                'content'     => 'View All Services',
                'image_url'   => null,
            ],
        ];

        foreach ($sections as $section) {
            PageSection::updateOrCreate(
                ['page_name' => $section['page_name'], 'section_key' => $section['section_key']],
                ['content' => $section['content'], 'image_url' => $section['image_url']]
            );
        }
    }
}
