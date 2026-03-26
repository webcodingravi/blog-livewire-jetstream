<?php

namespace App\Livewire\Backend\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('backend.admin.dashboard')->layout('layouts.admin')->layoutData(['metaTitle' => 'Dashboard - Admin']);
    }
}
