<?php

namespace App\Livewire\Front;

use App\Models\Post;
use Livewire\Component;

class BlogDetails extends Component
{
    public $blog;

    public function mount($blogSlug)
    {
        $this->blog = Post::with('category', 'user')->where('slug', $blogSlug)->firstOrFail();
    }

    public function render()
    {
        return view('front.blog-details');
    }
}
