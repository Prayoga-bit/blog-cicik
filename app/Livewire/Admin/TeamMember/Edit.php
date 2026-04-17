<?php

namespace App\Livewire\Admin\TeamMember;

use App\Models\TeamMember;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public TeamMember $member;
    public string $name = '';
    public string $position = '';
    public string $bio_description = '';
    public $photo;
    public ?string $oldPhoto = null;

    public function mount(TeamMember $teamMember)
    {
        $this->member = $teamMember;
        $this->name = $teamMember->name;
        $this->position = $teamMember->position;
        $this->bio_description = $teamMember->bio_description;
        $this->oldPhoto = $teamMember->photo_url;
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'bio_description' => ['required', 'string', 'max:65535'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ]);

        $photoUrl = $this->oldPhoto;
        if ($this->photo) {
            if ($this->oldPhoto && !str_starts_with($this->oldPhoto, 'http') && Storage::disk('public')->exists($this->oldPhoto)) {
                Storage::disk('public')->delete($this->oldPhoto);
            }
            $photoUrl = $this->photo->store('team-photos', 'public');
        }

        $this->member->update([
            'name' => $this->name,
            'position' => $this->position,
            'bio_description' => $this->bio_description,
            'photo_url' => $photoUrl,
        ]);

        session()->flash('message', 'Data team member berhasil diperbarui.');
        return $this->redirect(route('team-members'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.team-member.edit');
    }
}
