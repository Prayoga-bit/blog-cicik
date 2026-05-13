<?php

namespace App\Livewire\Admin;

use App\Services\TeamMemberService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class TeamMemberEditor extends Component
{
    use WithFileUploads;

    public array $members = [];

<<<<<<< HEAD
    // Form states
    public bool $isFormOpen = false;
    public bool $isEditing = false;

    // Form fields
    public ?int $memberId = null;
    public string $name = '';
    public string $position = '';
    public string $bio_description = '';
    public $photo;
    public ?string $oldPhoto = null;
=======
    public array $newMember = [
        'name' => '',
        'position' => '',
        'bio_description' => '',
        'photo_url' => '',
    ];

    public ?int $savedMemberId = null;
>>>>>>> a138344 (feat: adding the feature to add new member)

    public string $statusMessage = '';

    private function loadMembers(TeamMemberService $teamMemberService): void
    {
        $this->loadMembers($teamMemberService);
    }

    public function loadMembers(TeamMemberService $teamMemberService): void
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

<<<<<<< HEAD
    public function createNew(): void
=======
    public function mount(TeamMemberService $teamMemberService): void
    {
        $this->loadMembers($teamMemberService);
    }

    public function createMember(TeamMemberService $teamMemberService): void
    {
        $this->validate([
            'newMember.name' => ['required', 'string', 'max:255'],
            'newMember.position' => ['required', 'string', 'max:255'],
            'newMember.bio_description' => ['required', 'string', 'max:65535'],
            'newMember.photo_url' => ['nullable', 'string', 'max:2048'],
        ]);

        $payload = [
            'name' => trim($this->newMember['name']),
            'position' => trim($this->newMember['position']),
            'bio_description' => trim($this->newMember['bio_description']),
            'photo_url' => trim((string) ($this->newMember['photo_url'] ?? '')),
        ];

        $payload['photo_url'] = $payload['photo_url'] === '' ? null : $payload['photo_url'];

        $teamMemberService->createMember($payload);

        $this->reset('newMember');
        $this->newMember = [
            'name' => '',
            'position' => '',
            'bio_description' => '',
            'photo_url' => '',
        ];

        $this->savedMemberId = null;
        $this->loadMembers($teamMemberService);
        $this->statusMessage = 'Team member baru berhasil ditambahkan.';
    }

    public function saveMember(int $memberId, TeamMemberService $teamMemberService): void
>>>>>>> a138344 (feat: adding the feature to add new member)
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->isFormOpen = true;
        $this->statusMessage = '';
    }

    public function editMember(int $id, TeamMemberService $teamMemberService): void
    {
        $this->resetForm();
        $member = collect($this->members)->firstWhere('id', $id);
        if ($member) {
            $this->memberId = $member['id'];
            $this->name = $member['name'];
            $this->position = $member['position'];
            $this->bio_description = $member['bio_description'];
            $this->oldPhoto = $member['photo_url'];
            
            $this->isEditing = true;
            $this->isFormOpen = true;
            $this->statusMessage = '';
        }
    }

    public function closeForm(): void
    {
        $this->isFormOpen = false;
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->memberId = null;
        $this->name = '';
        $this->position = '';
        $this->bio_description = '';
        $this->photo = null;
        $this->oldPhoto = null;
        $this->resetValidation();
    }

    public function saveMember(TeamMemberService $teamMemberService): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'bio_description' => ['required', 'string', 'max:65535'],
            'photo' => ['nullable', 'image', 'max:5120'], // 5MB max
        ]);

        $photoUrl = $this->oldPhoto;
        if ($this->photo) {
            if ($this->oldPhoto && !str_starts_with($this->oldPhoto, 'http') && Storage::disk('public')->exists($this->oldPhoto)) {
                Storage::disk('public')->delete($this->oldPhoto);
            }
            $photoUrl = $this->photo->store('team-photos', 'public');
        }

        $payload = [
            'name' => $this->name,
            'position' => $this->position,
            'bio_description' => $this->bio_description,
            'photo_url' => $photoUrl,
        ];

        if ($this->isEditing && $this->memberId) {
            $teamMemberService->updateMember($this->memberId, $payload);
            $this->statusMessage = 'Data team member berhasil diperbarui.';
        } else {
            $teamMemberService->createMember($payload);
            $this->statusMessage = 'Data team member berhasil ditambahkan.';
        }

        $this->loadMembers($teamMemberService);
        $this->closeForm();
        
        // Flash message or keep it
        session()->flash('message', $this->statusMessage);
    }

    public function deleteMember(int $id, TeamMemberService $teamMemberService): void
    {
        $member = collect($this->members)->firstWhere('id', $id);
        if ($member) {
            if ($member['photo_url'] && !str_starts_with($member['photo_url'], 'http') && Storage::disk('public')->exists($member['photo_url'])) {
                Storage::disk('public')->delete($member['photo_url']);
            }
            $teamMemberService->deleteMember($id);
            $this->statusMessage = 'Data team member berhasil dihapus.';
            session()->flash('message', $this->statusMessage);
            $this->loadMembers($teamMemberService);
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.team-member-editor');
    }
}