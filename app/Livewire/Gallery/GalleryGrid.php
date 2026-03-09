<?php

namespace App\Livewire\Gallery;

use Livewire\Component;

class GalleryGrid extends Component
{
    public $items = [];
    public $selectedIndex = null;
    public $showModal = false;

    public function mount()
    {
        // Mock data. In a real app, this would be fetched from DB
        $this->items = [
            ['image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=800', 'interactive' => false],
            ['image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32f7?auto=format&fit=crop&q=80&w=800', 'title' => 'Title gallery Christin', 'subtitle' => 'Christin', 'interactive' => true],
            ['image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&q=80&w=800', 'interactive' => false],
            ['image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800', 'interactive' => false],
            ['image' => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&q=80&w=800', 'interactive' => false],
            ['image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=800', 'interactive' => false],
        ];
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