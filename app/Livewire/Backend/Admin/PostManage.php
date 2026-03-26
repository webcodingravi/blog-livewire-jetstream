<?php

namespace App\Livewire\Backend\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PostManage extends Component
{
    use WithFileUploads,WithPagination;

    public $title;

    public $slug;

    public $image;

    public $oldImage;

    public $description = '';

    public $status = 'draft';

    public $category_id;

    public $meta_title;

    public $meta_description;

    public $postId = null;

    public $isEdit = false;

    public $showTrashed = false;

    public $search = '';

    public $isOpen = false;

    public $filterStatus = '';

    public $categories = [];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetValidation();
        $this->resetForm();

    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterStatus()
    {
        $this->resetPage();
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    protected function rules()
    {
        return [
            'title' => 'required|max:280',
            'slug' => 'required|unique:posts,slug,'.$this->postId,
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'category_id' => 'required',
        ];
    }

    protected $messages = [
        'category_id.required' => 'Please Select a Category',
    ];

    public function mount()
    {
        $this->categories = Category::latest()->get();
    }

    public function edit($id)
    {
        try {
            $post = Post::findOrFail($id);
            $this->title = $post->title;
            $this->slug = $post->slug;
            $this->category_id = $post->category_id;
            $this->description = $post->description;
            $this->status = $post->status;
            $this->meta_title = $post->meta_title;
            $this->meta_description = $post->meta_description ?? '';
            $this->oldImage = $post->image;
            $this->postId = $post->id;
            $this->openModal();
            $this->isEdit = true;

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }

    }

    public function createPost()
    {

        $this->validate();
        DB::beginTransaction();
        try {
            $imageName = $this->oldImage;
            if (! empty($this->image)) {
                $path = 'uploads/posts/'.$this->oldImage;
                if ($this->oldImage && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }

                $imageName = uniqid().'.'.$this->image->extension();
                $this->image->storeAs('uploads/posts', $imageName, 'public');

            }
            Post::updateOrCreate(
                ['id' => $this->postId],
                [
                    'title' => $this->title,
                    'slug' => $this->slug,
                    'category_id' => $this->category_id,
                    'image' => $imageName,
                    'description' => $this->description ?? '',
                    'meta_title' => $this->meta_title,
                    'meta_description' => $this->meta_description,
                    'status' => $this->status,
                    'user_id' => auth()->id(),
                ]);

            if (! $this->postId) {
                session()->flash('success', 'Post Successfully Created');
            } else {
                session()->flash('success', 'Post Successfully Updated');
            }
            $this->closeModal();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset(['title', 'slug', 'image', 'oldImage', 'description', 'status', 'category_id', 'meta_title', 'meta_description', 'postId', 'isOpen', 'isEdit']);
    }

    public function delete($id)
    {
        try {
            Post::findOrFail($id)->delete();
            session()->flash('success', 'Post Successfully move to trash');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }

    }

    public function restore($id)
    {
        try {
            Post::onlyTrashed()->findOrFail($id)->restore();
            session()->flash('success', 'Post Successfully Restored');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());

        }
    }

    public function forceDelete($id)
    {
        try {
            $post = Post::onlyTrashed()->findOrFail($id);
            $path = 'uploads/posts/'.$post->image;
            if ($post->image && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $post->forceDelete();
            session()->flash('success', 'Post Successfully Permanently Deleted');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());

        }
    }

    public function render()
    {
        $posts = Post::with(['category:id,name', 'user:id,name'])
            ->when($this->showTrashed, function ($query) {
                $query->onlyTrashed();
            })
            ->when(! $this->showTrashed, function ($query) {
                $query->withoutTrashed();
            })
            ->when($this->search !== '', function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%'.$this->search.'%')
                        ->orWhereHas('category', function ($q2) {
                            $q2->where('name', 'like', '%'.$this->search.'%');
                        });
                });
            })
            ->when($this->filterStatus !== '', function ($query) {
                $query->where('status', $this->filterStatus);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.admin.post-manage', compact('posts'))->layout('layouts.admin')->layoutData(['metaTitle' => 'Post Manage - Admin']);
    }
}
