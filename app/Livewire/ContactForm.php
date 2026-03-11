<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $message = '';
    public bool $submitted = false;

    protected array $rules = [
        'name'    => 'required|string|min:2|max:100',
        'email'   => 'required|email|max:150',
        'message' => 'required|string|min:10|max:2000',
    ];

    protected array $messages = [
        'name.required'    => 'Please enter your full name.',
        'email.required'   => 'Please enter your email address.',
        'email.email'      => 'Please enter a valid email address.',
        'message.required' => 'Please enter your message.',
        'message.min'      => 'Message must be at least 10 characters.',
    ];

    public function submit(): void
    {
        $this->validate();

        // TODO: store to DB / send email
        // ContactMessage::create([...])
        // Mail::to('info@christineteam.com')->send(new ContactMail(...))

        $this->reset(['name', 'email', 'message']);
        $this->submitted = true;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.contact-form');
    }
}
