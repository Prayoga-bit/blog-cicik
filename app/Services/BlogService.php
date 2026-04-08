<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class BlogService
{
	public function getLatestPosts(int $limit = 3): Collection
	{
		return Blog::query()
			->withRichText('content')
			->with('author:id,name')
			->latest()
			->take($limit)
			->get();
	}

	/**
	 * Build paginated blog cards from persisted posts.
	 */
	public function paginateForGrid(string $search = '', int $perPage = 6, int $page = 1): LengthAwarePaginator
	{
		$query = Blog::query()
			->withRichText('content')
			->with('author:id,name')
			->latest();

		if ($search !== '') {
			$query->where(function ($innerQuery) use ($search): void {
				$innerQuery->where('title', 'like', "%{$search}%")
					->orWhere('category', 'like', "%{$search}%")
					->orWhereHas('richTextContent', function ($contentQuery) use ($search): void {
						$contentQuery->where('body', 'like', "%{$search}%");
					})
					->orWhereHas('author', function ($authorQuery) use ($search): void {
						$authorQuery->where('name', 'like', "%{$search}%");
					});
			});
		}

		$paginator = $query->paginate($perPage, ['*'], 'page', $page);

		$cards = $paginator->getCollection()
			->map(function (Blog $blog): array {
				return [
					'image' => $this->resolveImageUrl($blog->featured_image),
					'category' => $blog->category ?? 'General',
					'date' => $blog->created_at?->format('F j, Y') ?? '',
					'title' => $blog->title,
					'description' => Str::limit(strip_tags($blog->content), 150),
					'author' => $blog->author?->name ?? 'Editorial Team',
					'slug' => route('blog.read', $blog->slug),
				];
			})
			->values();

		$paginator->setCollection($cards);

		return $paginator;
	}

	private function resolveImageUrl(?string $imageUrl): string
	{
		if (! $imageUrl) {
			return 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&q=80&w=800';
		}

		if (str_starts_with($imageUrl, 'http')) {
			return $imageUrl;
		}

		return asset('storage/' . $imageUrl);
	}
}
