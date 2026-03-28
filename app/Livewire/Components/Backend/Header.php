<?php

namespace App\Livewire\Components\Backend;

use Livewire\Component;

class Header extends Component
{
    protected $listeners = ['profileUpdated' => '$refresh'];

    public function render()
    {
        return view('components.backend.header');
    }
}
