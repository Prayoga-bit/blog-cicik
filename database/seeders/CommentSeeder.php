<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $commenters = collect([
            ['name' => 'Alex Morgan', 'email' => 'alex@example.com'],
            ['name' => 'Jamie Lee', 'email' => 'jamie@example.com'],
            ['name' => 'Riley Chen', 'email' => 'riley@example.com'],
        ])->map(function (array $userData): User {
            return User::query()->updateOrCreate(
                ['email' => $userData['email']],
                ['name' => $userData['name'], 'password' => bcrypt('password')]
            );
        })->values();

        Comment::query()->delete();

        $templates = [
            'Great insights on this topic. The practical examples made it much easier to understand.',
            'Thanks for sharing this article. I would love to read a deeper follow-up on implementation steps.',
            'This was very helpful and relevant for current market conditions. Looking forward to more posts like this.',
            'Clear and concise explanation. The breakdown of risks and opportunities is especially useful.',
        ];

        $blogs = Blog::query()->orderBy('id')->get();

        foreach ($blogs as $index => $blog) {
            $firstUser = $commenters[$index % $commenters->count()];
            $secondUser = $commenters[($index + 1) % $commenters->count()];

            Comment::query()->create([
                'blog_id' => $blog->id,
                'user_id' => $firstUser->id,
                'comment_text' => $templates[$index % count($templates)],
                'created_at' => now()->subDays(($index % 7) + 2),
                'updated_at' => now()->subDays(($index % 7) + 2),
            ]);

            Comment::query()->create([
                'blog_id' => $blog->id,
                'user_id' => $secondUser->id,
                'comment_text' => $templates[($index + 1) % count($templates)],
                'created_at' => now()->subDays(($index % 7) + 1),
                'updated_at' => now()->subDays(($index % 7) + 1),
            ]);
        }
    }
}
