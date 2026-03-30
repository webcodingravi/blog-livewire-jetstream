<?php

namespace App\Livewire\Components\Front;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Header extends Component
{
    public $categories = [];

    public $search = '';

    public $results = [];

    public $setting;

    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->results = [];

            return;
        }

        $this->results = Post::with('category:id,name,slug', 'user:id,name')->where('title', 'like', '%'.$this->search.'%')->take(6)->get();
    }

    public function mount($setting = null)
    {
        $this->categories = Category::has('post')->where('status', true)->orderBy('id', 'desc')->get();
        $this->setting = $setting;
    }

    public function render()
    {
        return view('components.front.header');
    }
}
