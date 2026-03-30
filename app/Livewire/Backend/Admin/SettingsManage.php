<?php

namespace App\Livewire\Backend\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class SettingsManage extends Component
{
    use AuthorizesRequests;

    public function mount()
    {
        // Authorize the user to manage settings
        $this->authorize('manage_settings');
    }

    public function render()
    {
        return view('backend.admin.settings-manage')->layout('layouts.admin')->layoutData(['metaTitle' => 'Setting Manage']);
    }
}