<?php

namespace App\Livewire\Front;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Blog extends Component
{
    public $categorySlug;

    public $categories = [];

    public $latestPost = [];

    public $tags = [];

    public $tagName;

    public function mount($categorySlug = null)
    {
        $this->categorySlug = $categorySlug;
        $this->categories = Category::has('post')->where('status', true)->latest()->get();
        $this->latestPost = Post::latest()
            ->where('status', 'published')
            ->limit(4)->get();

        $this->tags = Tag::has('posts')->withCount('posts')->orderBy('name')->get();

    }

    public function render()
    {
        $blogs = Post::with(['category:id,name,slug', 'tags'])
            ->when(! empty($this->categorySlug), function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->categorySlug);
                });
            })
            ->when($this->tagName, function ($query) {
                $query->whereHas('tags', function ($q) {
                    $q->where('name', $this->tagName);
                });
            })
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        return view('front.blog', compact('blogs'))->layoutData(['metaTitle' => 'Blog', 'metaDiscription' => 'Blog']);
    }
}
