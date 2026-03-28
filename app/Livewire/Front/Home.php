<?php

namespace App\Livewire\Front;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $latestPost = [];

    public function mount()
    {

        $this->latestPost = Post::latest()
            ->where('status', 'published')
            ->limit(3)->get();

    }

    public function render()
    {
        return view('front.home');
    }
}
