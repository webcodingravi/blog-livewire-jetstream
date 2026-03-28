<?php

namespace App\Livewire\Components\Front;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->categories = Category::has('post')->where('status', true)->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('components.front.header');
    }
}
