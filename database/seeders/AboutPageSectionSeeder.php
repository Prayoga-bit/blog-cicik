<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class AboutPageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            // Hero
            ['page_name' => 'about', 'section_key' => 'hero_badge', 'content' => 'WHO WE ARE', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'hero_title', 'content' => 'ABOUT US', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'hero_description', 'content' => 'We are a team of dedicated professionals committed to providing expert financial advice and strategies. Our mission is to empower your financial future through innovative solutions and personalized care. With years of experience and a passion for excellence, we help our clients navigate the complexities of financial markets.', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'hero_button_label', 'content' => 'More Info', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'hero_image', 'content' => 'Modern corporate building', 'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1000&auto=format&fit=crop'],
            ['page_name' => 'about', 'section_key' => 'hero_badge_success_value', 'content' => '95%', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'hero_badge_success_label', 'content' => 'Client Success', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'hero_badge_experience_value', 'content' => '10+', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'hero_badge_experience_label', 'content' => 'Years of Experience', 'image_url' => null],

            // Vision Mission
            ['page_name' => 'about', 'section_key' => 'vision_badge', 'content' => 'OUR PURPOSE', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'vision_heading', 'content' => 'Vision & Mission', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'vision_image', 'content' => 'Business meeting', 'image_url' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?q=80&w=1000&auto=format&fit=crop'],
            ['page_name' => 'about', 'section_key' => 'vision_title', 'content' => 'Our Vision', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'vision_description', 'content' => 'To be the leading financial consultancy firm, recognized for our integrity, innovation, and unwavering commitment to client success. We envision a world where financial freedom is accessible to all through smart strategies and expert guidance.', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'mission_title', 'content' => 'Our Mission', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'mission_item_1', 'content' => 'Provide expert financial guidance tailored to individual needs.', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'mission_item_2', 'content' => 'Ensure transparency and trust in all our dealings.', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'mission_item_3', 'content' => 'Innovate constantly to stay ahead of market trends.', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'mission_item_4', 'content' => 'Empower clients with knowledge and tools for lasting success.', 'image_url' => null],

            // Team section texts
            ['page_name' => 'about', 'section_key' => 'team_badge', 'content' => 'Meet The Team', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'team_heading', 'content' => 'The Experts Behind Your Success', 'image_url' => null],
            ['page_name' => 'about', 'section_key' => 'team_description', 'content' => 'Our team of experienced professionals brings diverse expertise and a shared passion for helping clients achieve financial success.', 'image_url' => null],
        ];

        foreach ($sections as $section) {
            PageSection::updateOrCreate(
                ['page_name' => $section['page_name'], 'section_key' => $section['section_key']],
                ['content' => $section['content'], 'image_url' => $section['image_url']]
            );
        }
    }
}
