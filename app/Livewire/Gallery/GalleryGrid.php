<?php

namespace App\Livewire\Gallery;

use Livewire\Component;

class GalleryGrid extends Component
{
    public $items = [];
    public $selectedIndex = null;
    public $showModal = false;

    public function mount(array $items = []): void
    {
        $this->items = array_values($items);
    }

    public function render()
    {
        return view('livewire.gallery.gallery-grid');
    }

    public function openModal($index)
    {
        $this->selectedIndex = $index;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedIndex = null;
    }

    public function nextImage()
    {
        if ($this->selectedIndex !== null && $this->selectedIndex < count($this->items) - 1) {
            $this->selectedIndex++;
        } else {
            $this->selectedIndex = 0; // loop back
        }
    }

    public function prevImage()
    {
        if ($this->selectedIndex !== null && $this->selectedIndex > 0) {
            $this->selectedIndex--;
        } else {
            $this->selectedIndex = count($this->items) - 1; // loop to end
        }
    }
}