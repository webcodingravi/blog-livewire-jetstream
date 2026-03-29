<?php

namespace App\Livewire\Front;

use App\Models\Post;
use Livewire\Component;

class BlogDetails extends Component
{
    public $blog;

    public $retaledBlogs = [];

    public function mount($blogSlug)
    {
        $this->blog = Post::with('category', 'user:id,name')->where('slug', $blogSlug)->firstOrFail();
        $this->retaledBlogs = Post::with('category', 'user:id,name')
            ->where('category_id', $this->blog->category_id)
            ->where('id', '!=', $this->blog->id)
            ->where('status', 'published')
            ->latest()
            ->limit(4)
            ->get();
    }

    public function render()
    {
        return view('front.blog-details');
    }
}
