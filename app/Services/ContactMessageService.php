<?php

namespace App\Services;

use App\Models\ContactMessage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ContactMessageService
{
    /**
     * Retrieve paginated contact messages with optional keyword filtering.
     */
    public function getPaginatedMessages(string $search = '', int $perPage = 10): LengthAwarePaginator
    {
        return ContactMessage::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('message', 'like', "%{$search}%");
                });
            })
            ->latest('created_at')
            ->paginate($perPage);
    }

    /**
     * Delete a contact message by id.
     */
    public function deleteMessage(int $messageId): void
    {
        ContactMessage::query()->findOrFail($messageId)->delete();
    }
}