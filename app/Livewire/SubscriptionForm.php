<?php

namespace App\Livewire;

use Livewire\Component;

class SubscriptionForm extends Component
{
    public $email = '';
    public $successMessage = '';

    protected $rules = [
        'email' => 'required|email'
    ];

    public function subscribe()
    {
        $this->validate();
        
        // Add DB insertion or newsletter API logic here
        
        $this->successMessage = 'Thanks for subscribing!';
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.subscription-form');
    }
}
