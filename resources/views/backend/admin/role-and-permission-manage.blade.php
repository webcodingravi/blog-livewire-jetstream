<div>

    <div class="py-6 px-4">
        <div class=" flex justify-center">
            <x-alert-message />
        </div>

        <h3 class="text-3xl font-medium text-gray-700 my-4">Role & Permission Management</h3>
        {{-- Role Form --}}
        <input type="text" wire:model="name" placeholder="Role Name"
            class="border rounded-md border-gray-200 focus:outline-none focus:ring-0 p-2">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 mt-4">
            @foreach ($permissions as $permission)
                <label class="flex items-center gap-2">
                    <input type="checkbox" value="{{ $permission->name }}" wire:model="selectedPermissions"
                        class="rounded border-gray-400 focus:outline-none focus:ring-0">
                    {{ $permission->name }}
                </label>
            @endforeach
        </div>

        <button wire:click="{{ $roleId ? 'updateRole' : 'createRole' }}" class="bg-black text-white px-4 py-2 mt-4">
            {{ $roleId ? 'Update' : 'Create' }}
        </button>

        {{-- Role List --}}
        <div class="mt-6">
            @foreach ($roles as $role)
                <div class="flex justify-between border p-2 mb-2">
                    <div>
                        <strong>{{ $role->name }}</strong>
                        <div class="text-sm text-gray-500">
                            {{ implode(', ', $role->permissions->pluck('name')->toArray()) }}
                        </div>
                    </div>

                    <div class="flex items-center">
                        <button wire:click="edit({{ $role->id }})" class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen">
                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path
                                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                            </svg>
                        </button>
                        <button wire:click="deleteRole({{ $role->id }})"
                            wire:confirm="Are you sure want to Deleted Role?"
                            class="ml-2 text-red-600 hover:text-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                <path d="M10 11v6" />
                                <path d="M14 11v6" />
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                <path d="M3 6h18" />
                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


</div>
