<?php

namespace App\Livewire\Backend\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionManage extends Component
{
    public $roles;

    public $permissions;

    public $name;

    public $selectedPermissions = [];

    public $roleId;

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function createRole()
    {
        $this->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => $this->name,
            'guard_name' => 'web',
        ]);

        $role->syncPermissions(
            Permission::whereIn('name', $this->selectedPermissions)
                ->where('guard_name', 'web')
                ->get()
        );
        session()->flash('success', 'Role created successfully.');
        $this->reset(['name', 'selectedPermissions']);
        $this->mount();

    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        $this->roleId = $id;
        $this->name = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
    }

    public function updateRole()
    {

        $role = Role::findOrFail($this->roleId);
        $role->update(['name' => $this->name]);
        $role->syncPermissions($this->selectedPermissions);
        session()->flash('success', 'Role updated successfully.');
        $this->reset(['name', 'selectedPermissions', 'roleId']);
        $this->mount();
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);

        if (! $role) {
            session()->flash('error', 'Role not found');

            return;
        }

        if ($role->name === 'admin') {
            session()->flash('error', 'Admin role cannot be deleted');

            return;
        }

        $role->syncPermissions([]); // optional but safe
        $role->delete();

        session()->flash('success', 'Role deleted');

        $this->roles = Role::with('permissions')->get();
    }

    public function render()
    {
        return view('backend.admin.role-and-permission-manage')->layout('layouts.admin')->layoutData(['metaTitle' => 'Role & Permission Manage']);
    }
}
