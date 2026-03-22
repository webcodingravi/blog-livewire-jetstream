<?php

namespace App\Livewire\Author;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('author.dashboard')->layout('layouts.admin');
    }
}
