<?php

namespace App\Livewire\Admin\TeamMember;

use App\Models\TeamMember;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public function deleteMember(int $id)
    {
        $member = TeamMember::find($id);
        if ($member) {
            if ($member->photo_url && !str_starts_with($member->photo_url, 'http') && Storage::disk('public')->exists($member->photo_url)) {
                Storage::disk('public')->delete($member->photo_url);
            }
            $member->delete();
            session()->flash('message', 'Data team member berhasil dihapus.');
        }
    }

    public function render()
    {
        $members = TeamMember::orderBy('id', 'asc')->get();
        return view('livewire.admin.team-member.index', compact('members'));
    }
}
