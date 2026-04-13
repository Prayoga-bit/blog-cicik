<x-app-layout>
	<x-slot name="header">
		<div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<span class="mb-2 inline-flex rounded-full bg-brand-yellow px-4 py-1 text-xs font-bold uppercase tracking-[0.2em] text-brand-dark">
					My Gallery
				</span>
				<h2 class="font-cursive text-4xl leading-tight text-brand-dark md:text-5xl">
					Gallery Editor
				</h2>
				<p class="mt-1 text-sm text-brand-gray">
					Manage your gallery entries.
				</p>
			</div>
		</div>
	</x-slot>

	<livewire:admin.user-gallery-editor />
</x-app-layout>
