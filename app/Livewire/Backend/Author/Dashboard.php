<?php

namespace App\Livewire\Backend\Author;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('backend.author.dashboard')->layout('layouts.admin');
    }
}
