<?php

namespace App\Services;

use App\Models\TeamMember;
use Illuminate\Support\Collection;

class TeamMemberService
{
    /**
     * Retrieve all team members for the admin editor.
     */
    public function getEditableMembers(): Collection
    {
        return TeamMember::query()
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Create a new team member.
     */
    public function createMember(array $payload): TeamMember
    {
        return TeamMember::create([
            'name' => $payload['name'],
            'position' => $payload['position'],
            'bio_description' => $payload['bio_description'],
            'photo_url' => $payload['photo_url'] ?? null,
        ]);
    }

    /**
     * Update a team member's editable profile fields.
     */
    public function updateMember(int $memberId, array $payload): TeamMember
    {
        $member = TeamMember::query()->findOrFail($memberId);

        $member->update([
            'name' => $payload['name'] ?? $member->name,
            'position' => $payload['position'] ?? $member->position,
            'bio_description' => $payload['bio_description'] ?? $member->bio_description,
            'photo_url' => array_key_exists('photo_url', $payload) ? $payload['photo_url'] : $member->photo_url,
        ]);

        return $member;
    }

    /**
     * Delete a team member.
     */
    public function deleteMember(int $memberId): void
    {
        $member = TeamMember::query()->findOrFail($memberId);
        $member->delete();
    }
}