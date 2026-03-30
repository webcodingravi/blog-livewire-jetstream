<?php

namespace App\Livewire\Backend\Admin;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class UserManage extends Component
{
    use AuthorizesRequests,WithPagination;

    public $showTrashed = false;

    public $roleFilter = '';

    public $search = '';

    public function mount()
    {
        $this->authorize('manage_users');
    }

    public function updatedRoleFilter()
    {
        $this->resetPage();
    }

    public function approveAuthor($id)
    {
        $this->authorize('manage_users');
        try {
            $user = User::findOrFail($id);

            // status update
            $user->update([
                'status' => 'approved',
            ]);

            // role update (user → author)
            $user->removeRole('user');
            $user->assignRole('author');

            session()->flash('success', 'Author Approved Successfully');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function delete($id)
    {
        $this->authorize('manage_users');
        try {
            User::findOrFail($id)->delete();
            session()->flash('success', 'User Successfully Move to trash');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function restore($id)
    {
        $this->authorize('manage_users');
        try {
            User::onlyTrashed()->findOrFail($id)->restore();
            session()->flash('success', 'User Successfully Restored');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function forceDelete($id)
    {
        $this->authorize('manage_users');
        try {
            User::onlyTrashed()->findOrFail($id)->forceDelete();

            session()->flash('success', 'User Successfully Permanently Deleted');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function export()
    {
        $this->authorize('manage_users');

        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function render()
    {
        $this->authorize('manage_users');
        $users = User::query()
            ->when($this->showTrashed, function ($query) {
                $query->onlyTrashed();
            })
            ->when(! $this->showTrashed, function ($query) {
                $query->withoutTrashed();
            })
            ->when($this->roleFilter, function ($q) {
                $q->role($this->roleFilter);
            })
            ->when($this->search !== '', function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->when($this->search !== '', function ($query) {
                $query->where('email', 'like', '%'.$this->search.'%');
            })

            ->role(['user', 'author'])

            ->orderBy('id', 'desc')->paginate(7);

        return view('backend.admin.user-manage', compact('users'))->layout('layouts.admin')->layoutData(['metaTitle' => 'Users Manage']);
    }
}
