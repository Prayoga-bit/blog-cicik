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

            // ── Gallery ─────────────────────────────────────────────────────
            [
                'page_name'   => 'gallery',
                'section_key' => 'gallery_badge',
                'content'     => 'Visual Stories',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'gallery',
                'section_key' => 'gallery_title',
                'content'     => 'Discover and Share Stunning Stories Through Our Gallery',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'gallery',
                'section_key' => 'gallery_description',
                'content'     => 'A curated wall of documentation from our sessions, strategy meetings, client discussions, and the milestones behind every decision.',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'gallery',
                'section_key' => 'gallery_scroll_label',
                'content'     => 'Scroll to explore',
                'image_url'   => null,
            ],

            // ── Blog ──────────────────────────────────────────────────────
            [
                'page_name'   => 'blog',
                'section_key' => 'blog_title',
                'content'     => 'Our Journal',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'blog',
                'section_key' => 'blog_subtitle',
                'content'     => 'Insights, strategies, and stories from our team of financial experts.',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'blog',
                'section_key' => 'blog_search_placeholder',
                'content'     => 'Search articles...',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'blog',
                'section_key' => 'blog_empty_title',
                'content'     => 'No articles found.',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'blog',
                'section_key' => 'blog_empty_subtitle',
                'content'     => 'Try adjusting your search terms.',
                'image_url'   => null,
            ],

            // ── Contact ───────────────────────────────────────────────────
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_title',
                'content'     => 'Get In Touch',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_subtitle',
                'content'     => "Have a question or want to work together? We'd love to hear from you.",
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_info_title',
                'content'     => 'Contact Information',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_address_title',
                'content'     => 'Office Address',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_address',
                'content'     => "123 Financial District\nJakarta, Indonesia 12345",
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_phone_title',
                'content'     => 'Phone',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_phone_1',
                'content'     => '+62 21 1234 5678',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_phone_2',
                'content'     => '+62 812 3456 7890',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_email_title',
                'content'     => 'Email',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_email_1',
                'content'     => 'info@christineteam.com',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_email_2',
                'content'     => 'support@christineteam.com',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_hours_title',
                'content'     => 'Business Hours',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_hours_1',
                'content'     => 'Monday – Friday: 9AM – 6PM',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_hours_2',
                'content'     => 'Saturday: 9AM – 2PM',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_quick_response_title',
                'content'     => 'Quick Response',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_quick_response_text',
                'content'     => 'We typically respond to all inquiries within 24 hours during business days. For urgent matters, please call our office directly.',
                'image_url'   => null,
            ],
            [
                'page_name'   => 'contact',
                'section_key' => 'contact_map_embed_url',
                'content'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0317704086347!2d110.41033881080392!3d-7.005541868588885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b6fe8586933%3A0x91135497d5a8bf34!2sRifan%20Financindo%20Berjangka%20Pt.%2C%20Gajahmungkur%2C%20Kec.%20Gajahmungkur%2C%20Kota%20Semarang%2C%20Jawa%20Tengah!5e0!3m2!1sen!2sid!4v1773195434484!5m2!1sen!2sid',
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
