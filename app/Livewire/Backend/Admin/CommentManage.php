<?php

namespace App\Livewire\Backend\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class CommentManage extends Component
{
    use WithPagination;

    public $showTrashed = false;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        session()->flash('success', 'Comment deleted successfully!');
    }

    public function restore($id)
    {
        $comment = Comment::withTrashed()->findOrFail($id);
        $comment->restore();

        session()->flash('success', 'Comment restored successfully!');
    }

    public function forceDelete($id)
    {
        $comment = Comment::withTrashed()->findOrFail($id);
        $comment->forceDelete();

        session()->flash('success', 'Comment permanently deleted successfully!');
    }

    public function render()
    {
        $comments = Comment::with('post:id,title', 'user:id,name')
            ->when($this->showTrashed, function ($query) {
                $query->onlyTrashed();
            })
            ->when(! $this->showTrashed, function ($query) {
                $query->withoutTrashed();
            })
            ->when($this->search !== '', function ($query) {
                $query->whereHas('post', function ($q) {
                    $q->where('title', 'like', '%'.$this->search.'%');
                });
                $query->orWhereHas('user', function ($q) {
                    $q->where('name', 'like', '%'.$this->search.'%');
                });
                $query->orWhere('comment', 'like', '%'.$this->search.'%');
            })
            ->latest()
            ->paginate(7);

        return view('backend.admin.comment-manage', compact('comments'))->layout('layouts.admin')->layoutData(['metaTitle' => 'Comments Manage']);
    }
}
