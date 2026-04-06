<?php

namespace App\Livewire\Admin;

use App\Services\ContactMessageService;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessageManager extends Component
{
    use WithPagination;

    public string $search = '';

    public string $statusMessage = '';

    protected string $paginationTheme = 'tailwind';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function deleteMessage(int $messageId, ContactMessageService $contactMessageService): void
    {
        $contactMessageService->deleteMessage($messageId);

        $this->statusMessage = 'Pesan berhasil dihapus.';
        $this->resetPage();
    }

    public function render(): \Illuminate\View\View
    {
        $messages = app(ContactMessageService::class)
            ->getPaginatedMessages($this->search, 10);

        return view('livewire.admin.contact-message-manager', [
            'messages' => $messages,
        ]);
    }
}