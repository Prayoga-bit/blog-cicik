<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            PageSectionSeeder::class,
            AboutPageSectionSeeder::class,
            ProjectAreaSeeder::class,
            TeamMemberSeeder::class,
            GallerySeeder::class,
            BlogSeeder::class,
        ]);
    }
}
