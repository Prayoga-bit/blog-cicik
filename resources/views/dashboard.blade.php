<x-app-layout>
	<x-slot name="header">
		<div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<span class="mb-2 inline-flex rounded-full bg-brand-yellow px-4 py-1 text-xs font-bold uppercase tracking-[0.2em] text-brand-dark">
					Dashboard Admin
				</span>
				<h2 class="font-cursive text-4xl leading-tight text-brand-dark md:text-5xl">
					Admin Dashboard
				</h2>
				<p class="mt-1 text-sm text-brand-gray">
					General overview and statistics.
				</p>
			</div>
		</div>
	</x-slot>

	<div class="bg-brand-light min-h-screen pb-12">
		<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
			<livewire:admin.stats-overview
				:user-name="$userName"
				:is-admin="$isAdmin"
				:blog-count="$blogCount"
				:gallery-count="$galleryCount"
			/>
		</div>
	</div>
</x-app-layout>
