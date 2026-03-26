<?php

namespace App\Livewire\Backend\Admin;

use Livewire\Component;

class UserManage extends Component
{
    public function render()
    {
        return view('backend.admin.user-manage')->layout('layouts.admin')->layoutData(['metaTitle' => 'Users Manage - Admin']);
    }
}
