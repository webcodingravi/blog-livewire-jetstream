<?php

namespace App\Livewire\Components\Front\Blog;

use Livewire\Component;

class BlogList extends Component
{
    public $blog;
    public function mount($blog) {
       $this->blog = $blog;
    }
    public function render()
    {
        return view('components.front.blog.blog-list');
    }
}
