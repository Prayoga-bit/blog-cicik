<x-app-layout>
	<x-slot name="header">
		<div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
					Team Members
				</h2>
				<p class="mt-1 text-sm text-gray-500">
					Edit team member profiles without reloading the page.
				</p>
			</div>
		</div>
	</x-slot>

	<livewire:admin.team-member-editor />
</x-app-layout>
