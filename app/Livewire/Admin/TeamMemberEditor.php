<?php

namespace App\Livewire\Admin;

use App\Services\TeamMemberService;
use Livewire\Component;

class TeamMemberEditor extends Component
{
    public array $members = [];

    public ?int $savedMemberId = null;

    public string $statusMessage = '';

    public function mount(TeamMemberService $teamMemberService): void
    {
        $this->members = $teamMemberService->getEditableMembers()
            ->map(function ($member): array {
                return [
                    'id' => $member->id,
                    'name' => $member->name,
                    'position' => $member->position,
                    'bio_description' => $member->bio_description,
                    'photo_url' => $member->photo_url,
                ];
            })
            ->all();
    }

    public function saveMember(int $memberId, TeamMemberService $teamMemberService): void
    {
        $memberIndex = collect($this->members)->search(fn (array $member) => (int) $member['id'] === $memberId);

        if ($memberIndex === false) {
            return;
        }

        $this->validate([
            "members.{$memberIndex}.name" => ['required', 'string', 'max:255'],
            "members.{$memberIndex}.position" => ['required', 'string', 'max:255'],
            "members.{$memberIndex}.bio_description" => ['required', 'string', 'max:65535'],
            "members.{$memberIndex}.photo_url" => ['nullable', 'string', 'max:2048'],
        ]);

        $payload = $this->members[$memberIndex];
        $payload['photo_url'] = trim((string) ($payload['photo_url'] ?? ''));
        $payload['photo_url'] = $payload['photo_url'] === '' ? null : $payload['photo_url'];

        $teamMemberService->updateMember($memberId, $payload);

        $this->savedMemberId = $memberId;
        $this->statusMessage = 'Data team member berhasil diperbarui.';
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.team-member-editor');
    }
}