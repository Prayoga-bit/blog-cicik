<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'James Anderson',
                'position' => 'CEO & Founder',
                'bio_description' => 'Leads the firm with long-term strategic direction and client-focused leadership.',
                'photo_url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=400&auto=format&fit=crop',
            ],
            [
                'name' => 'Sarah Mitchell',
                'position' => 'Head of Strategy',
                'bio_description' => 'Designs growth-focused investment and advisory strategies across market conditions.',
                'photo_url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400&auto=format&fit=crop',
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Senior Analyst',
                'bio_description' => 'Transforms financial data into practical insights for better investment decisions.',
                'photo_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop',
            ],
            [
                'name' => 'Emily Rodriguez',
                'position' => 'Risk Manager',
                'bio_description' => 'Builds robust risk controls to help protect client portfolios and capital.',
                'photo_url' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=400&auto=format&fit=crop',
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                [
                    'position' => $member['position'],
                    'bio_description' => $member['bio_description'],
                    'photo_url' => $member['photo_url'],
                ]
            );
        }
    }
}
