<?php

namespace App\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;

class StatsOverview extends Component
{
    public string $userName = '';

    public bool $isAdmin = false;

    public int $blogCount = 0;

    public int $galleryCount = 0;

    public function render(): View
    {
        return view('livewire.admin.stats-overview');
    }
}
