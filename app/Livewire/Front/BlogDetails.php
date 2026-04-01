<?php

namespace App\Livewire\Front;

use App\Models\Category;
use App\Models\Comment as ModelsComment;
use App\Models\Post;
use App\Models\Tag;
use Dom\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class BlogDetails extends Component
{
    use AuthorizesRequests;

    public $blog;

    public $retaledBlogs = [];

    public $latestPost = [];

    public $tags = [];

    public $tagName;

    public $categories = [];

    public $comment;

    public $comments = [];

    public $metaTitle = 'Blog';

    public $metaDescription = 'Blog';

    public function mount($blogSlug)
    {
        $this->blog = Post::with('category', 'user:id,name')->where('slug', $blogSlug)->firstOrFail();
        $this->blog->increment('views');
        $this->retaledBlogs = Post::with('category', 'user:id,name')
            ->where('category_id', $this->blog->category_id)
            ->where('id', '!=', $this->blog->id)
            ->where('status', 'published')
            ->latest()
            ->limit(4)
            ->get();

        $this->categories = Category::has('post')->where('status', true)->latest()->get();

        $this->latestPost = Post::latest()
            ->where('status', 'published')
            ->limit(4)->get();

        $this->tags = Tag::has('posts')->withCount('posts')->orderBy('name')->get();
        $this->loadComments();

        if ($this->blog) {
            $this->metaTitle = $this->blog->meta_title ?? $this->blog->title;
            $this->metaDescription = $this->blog->meta_description ?? $this->blog->title;
        }

    }

    public function filterByTag($tagSlug)
    {
        $this->tagName = $tagSlug;
    }

    public function submitComment()
    {
        $this->authorize('create_comment');
        if (! auth()->check()) {
            session()->flash('error', 'You must be logged in to submit a comment.');

            return;
        }
        $this->validate([
            'comment' => 'required|string|min:3|max:1000',
        ]);

        try {
            // Handle comment submission logic here
            ModelsComment::create([
                'post_id' => $this->blog->id,
                'user_id' => auth()->id(),
                'comment' => $this->comment,
            ]);

            session()->flash('success', 'Comment submitted successfully!');
            $this->reset('comment');
            $this->loadComments(); // Optionally reload comments to show the new comment immediately
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to submit comment. Please try again.');
        }

    }

    public function loadComments()
    {
        $this->comments = ModelsComment::with('user:id,name')
            ->where('post_id', $this->blog->id)
            ->latest()
            ->get();

    }

    public function render()
    {
        return view('front.blog-details')->layoutData(['metaTitle' => $this->metaTitle, 'metaDescription' => $this->metaDescription]);
    }
}
