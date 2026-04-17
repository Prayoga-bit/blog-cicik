<?php

namespace App\Livewire\Admin\TeamMember;

use App\Models\TeamMember;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $position = '';
    public string $bio_description = '';
    public $photo;

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'bio_description' => ['required', 'string', 'max:65535'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ]);

        $photoUrl = null;
        if ($this->photo) {
            $photoUrl = $this->photo->store('team-photos', 'public');
        }

        TeamMember::create([
            'name' => $this->name,
            'position' => $this->position,
            'bio_description' => $this->bio_description,
            'photo_url' => $photoUrl,
        ]);

        session()->flash('message', 'Data team member berhasil ditambahkan.');
        return $this->redirect(route('team-members'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.team-member.create');
    }
}
