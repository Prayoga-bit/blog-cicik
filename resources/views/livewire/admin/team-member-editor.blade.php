<div class="space-y-6 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            @if ($statusMessage)
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ $statusMessage }}
                </div>
            @endif

            @forelse ($members as $index => $member)
                <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm" wire:key="member-{{ $member['id'] }}">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $member['name'] ?: 'Team Member' }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ __('Update profile details for this team member.') }}
                                </p>
                            </div>

                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium uppercase tracking-wide text-gray-600">
                                #{{ $member['id'] }}
                            </span>
                        </div>
                    </div>

                    <form wire:submit.prevent="saveMember({{ $member['id'] }})" class="space-y-4 px-6 py-6">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="member-name-{{ $member['id'] }}">
                                {{ __('Name') }}
                            </label>
                            <input
                                id="member-name-{{ $member['id'] }}"
                                type="text"
                                wire:model="members.{{ $index }}.name"
                                class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('members.' . $index . '.name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="member-position-{{ $member['id'] }}">
                                {{ __('Position') }}
                            </label>
                            <input
                                id="member-position-{{ $member['id'] }}"
                                type="text"
                                wire:model="members.{{ $index }}.position"
                                class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('members.' . $index . '.position')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="member-bio-{{ $member['id'] }}">
                                {{ __('Bio Description') }}
                            </label>
                            <textarea
                                id="member-bio-{{ $member['id'] }}"
                                wire:model="members.{{ $index }}.bio_description"
                                rows="4"
                                class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            ></textarea>
                            @error('members.' . $index . '.bio_description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-900" for="member-photo-{{ $member['id'] }}">
                                {{ __('Photo URL') }}
                            </label>
                            <input
                                id="member-photo-{{ $member['id'] }}"
                                type="text"
                                wire:model="members.{{ $index }}.photo_url"
                                placeholder="https://..."
                                class="block w-full rounded-lg border-gray-300 bg-white text-sm shadow-sm focus:border-brand-green focus:ring-brand-green"
                            />
                            @error('members.' . $index . '.photo_url')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            @if ($savedMemberId === $member['id'])
                                <p class="text-sm text-green-700">
                                    {{ __('Saved.') }}
                                </p>
                            @else
                                <span></span>
                            @endif

                            <button
                                type="submit"
                                class="inline-flex items-center rounded-lg bg-brand-green px-4 py-2 text-sm font-semibold text-white transition hover:bg-brand-dark disabled:cursor-not-allowed disabled:opacity-75"
                                wire:loading.attr="disabled"
                            >
                                <span wire:loading.remove>{{ __('Save Member') }}</span>
                                <span wire:loading>{{ __('Saving...') }}</span>
                            </button>
                        </div>
                    </form>
                </section>
            @empty
                <div class="rounded-lg border border-dashed border-gray-300 bg-white px-6 py-10 text-center text-sm text-gray-500">
                    {{ __('No team members are available yet.') }}
                </div>
            @endforelse
        </div>
    </div>
</div>