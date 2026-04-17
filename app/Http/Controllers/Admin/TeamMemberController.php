<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        return view('admin.team-members.index');
    }

    public function create(): View
    {
        return view('admin.team-members.create');
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }
}