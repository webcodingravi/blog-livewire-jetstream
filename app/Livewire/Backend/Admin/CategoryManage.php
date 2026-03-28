<?php

namespace App\Livewire\Backend\Admin;

use App\Exports\CategoriesExport;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class CategoryManage extends Component
{
    use WithPagination;

    public $isOpen = false;

    public $name;

    public $slug;

    public $status = true;

    public $meta_title;

    public $meta_description;

    public $categoryId = null;

    public $isEdit = false;

    public $showTrashed = false;

    public $search = '';

    public $filterStatus = '';

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

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterStatus()
    {
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'name' => 'required|max:280',
            'slug' => 'required|unique:categories,slug,'.$this->categoryId,
        ];
    }

    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->status = $category->status;
            $this->meta_title = $category->meta_title;
            $this->meta_description = $category->meta_description;
            $this->categoryId = $category->id;
            $this->openModal();
            $this->isEdit = true;

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }

    }

    public function createCategory()
    {
        $this->validate();
        try {
            $category = Category::updateOrCreate(
                ['id' => $this->categoryId],
                [
                    'name' => $this->name,
                    'slug' => $this->slug,
                    'status' => $this->status,
                    'meta_title' => $this->meta_title,
                    'meta_description' => $this->meta_description,
                ]);
            if (! $this->categoryId) {
                session()->flash('success', "$category->name New Category Successfully Created");
            } else {
                session()->flash('success', "$category->name Category Successfully Updated");

            }

            $this->closeModal();

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Category::findOrFail($id)->delete();

            session()->flash('success', 'Category Successfully move to trash');

        } catch (\Exception $e) {
            session()->flash('error', 'server Error'.$e->getMessage());
        }
    }

    public function restore($id)
    {
        try {
            Category::onlyTrashed()->findOrFail($id)->restore();

            session()->flash('success', 'Category Successfully Restored');

        } catch (\Exception $e) {
            session()->flash('error', 'server Error'.$e->getMessage());

        }
    }

    public function forceDelete($id)
    {
        try {
            Category::onlyTrashed()->findOrFail($id)->forceDelete();

            session()->flash('success', 'Category Successfully Permanently Deleted');

        } catch (\Exception $e) {
            session()->flash('error', 'server Error'.$e->getMessage());

        }
    }

    private function resetForm()
    {
        $this->reset(['name', 'slug', 'status', 'meta_title', 'meta_description', 'categoryId', 'isEdit', 'isOpen']);
    }

    public function export()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }

    public function render()
    {
        $categories = Category::query()
            ->when($this->showTrashed, function ($query) {
                $query->onlyTrashed();
            })
            ->when(! $this->showTrashed, function ($query) {
                $query->withoutTrashed();
            })
            ->when($this->search !== '', function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->when($this->filterStatus !== '', function ($query) {
                $query->where('status', (int) $this->filterStatus);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.admin.category-manage', compact('categories'))->layout('layouts.admin')->layoutData(['metaTitle' => 'Category Manage - Admin']);
    }
}
