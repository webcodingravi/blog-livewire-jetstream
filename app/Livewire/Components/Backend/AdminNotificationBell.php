<?php

namespace App\Livewire\Components\Backend;

use Livewire\Component;

class AdminNotificationBell extends Component
{
    public $notifications = [];

    public $open = false;

    public function toggle()
    {
        $this->open = ! $this->open;
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        $this->loadNotifications();
    }

    public function mount()
    {
        $this->loadNotifications();
    }

    public function loadNotifications()
    {
        $this->notifications = auth()->user()
            ->unreadNotifications
            ->take(10)
            ->toArray();
    }

    public function render()
    {
        return view('components.backend.admin-notification-bell');
    }
}
