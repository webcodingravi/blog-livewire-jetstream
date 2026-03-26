<?php

namespace App\Livewire\Backend\Admin;

use Livewire\Component;

class SettingsManage extends Component
{
    public function render()
    {
        return view('backend.admin.settings-manage')->layout('layouts.admin')->layoutData(['metaTitle' => 'Setting Manage - Admin']);
    }
}
