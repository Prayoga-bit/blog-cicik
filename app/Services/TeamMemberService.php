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
            ->latest('id')
            ->get();
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
            'photo_url' => $payload['photo_url'] ?? null,
        ]);

        return $member;
    }
}