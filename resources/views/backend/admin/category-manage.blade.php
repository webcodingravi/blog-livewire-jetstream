<div>

    <div class=" py-8  px-4 ">
        <div class=" flex justify-center">
            <x-alert-message />
        </div>
        <div class="flex flex-col lg:flex-row  lg:items-center lg:justify-between">
            <h3 class="text-3xl font-medium text-gray-700">Categories</h3>

            <div class="mt-4 flex lg:flex-row flex-col  lg:items-center gap-4">
                <input type="search" wire:model.live.debounce.500ms="search"
                    class="border border-gray-200 rounded-md py-3 focus:outline-none foucs:ring-0 focus:shadow-none focus:border-gray-200 text-sm w-[300px]"
                    placeholder="Search...">

                <button wire:click="export" wire:navigate
                    class="flex-inline bg-green-500 py-3 px-4 rounded-md text-white active:scale-90 duration-300 transition-all text-sm w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-spreadsheet-icon lucide-file-spreadsheet">
                        <path
                            d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z" />
                        <path d="M14 2v5a1 1 0 0 0 1 1h5" />
                        <path d="M8 13h2" />
                        <path d="M14 13h2" />
                        <path d="M8 17h2" />
                        <path d="M14 17h2" />
                    </svg>
                </button>



                <button wire:click="$toggle('showTrashed')"
                    class="flex-inline bg-rose-500 py-3 px-4 rounded-md text-white active:scale-90 duration-300 transition-all text-sm w-fit">
                    {{ $showTrashed ? 'Show Active' : 'Show Trash' }}
                </button>

                <select
                    class="rounded-md border-gray-200 focus:outline-none focus:ring-0 focus:shadow-none focus:border-gray-200 cursor-pointer w-fit"
                    wire:model.live.debounce.500ms= "filterStatus">
                    <option value="">All</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

                <button wire:click="openModal"
                    class="text-sm px-4 py-3 font-medium text-white bg-gray-950 rounded-md hover:bg-gray-800 active:scale-95 duration-300 transition-all inline-flex gap-2 w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>Add New
                    Category</button>

            </div>

        </div>
        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2  sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8 overflow-x-auto">
                    <table class="min-w-full border">
                        <thead>
                            <tr>
                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    S.NO.
                                </th>
                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Name
                                </th>
                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Slug
                                </th>

                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Posts
                                </th>
                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Status
                                </th>

                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Created Date
                                </th>
                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if (count($categories) > 0)
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="p-6 whitespace-nowrap">
                                            <span class="text-sm text-gray-900">

                                                {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                            </span>
                                        </td>

                                        <td class="p-6">
                                            <span class="text-sm text-gray-900">

                                                {{ $category->name }}
                                            </span>
                                        </td>
                                        <td class="p-6 ">
                                            <span class="text-sm text-gray-900">

                                                {{ $category->slug }}
                                            </span>
                                        </td>

                                        <td class="p-6 ">
                                            <span class="text-sm text-gray-900">

                                                {{ $category->post->count() }}
                                            </span>
                                        </td>


                                        <td class="p-6">
                                            @if ($category->status)
                                                <span
                                                    class='text-sm text-green-900 bg-green-100 rounded-full px-3 py-1'>Active</span>
                                            @else
                                                <span
                                                    class='text-sm bg-rose-100 text-rose-800 rounded-full px-3 py-1'>Inactive</span>
                                            @endif

                                        </td>


                                        <td class="p-6">
                                            <span class="text-sm text-gray-900">

                                                {{ \Carbon\Carbon::parse($category->created_at)->format('d M Y') }}
                                            </span>
                                        </td>
                                        <td class="p-6 text-sm font-medium flex gap-1">
                                            <button wire:click="edit({{ $category->id }})"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-square-pen-icon lucide-square-pen">
                                                    <path
                                                        d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                    <path
                                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                                </svg>
                                            </button>
                                            @if (!$showTrashed)
                                                <button wire:click="delete({{ $category->id }})"
                                                    class="ml-2 text-red-600 hover:text-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-trash2-icon lucide-trash-2">
                                                        <path d="M10 11v6" />
                                                        <path d="M14 11v6" />
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                                        <path d="M3 6h18" />
                                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    </svg>
                                                </button>
                                            @else
                                                <button wire:click="restore({{ $category->id }})"
                                                    class="ml-2 text-info-600 hover:text-info-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-rotate-ccw-icon lucide-rotate-ccw">
                                                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                                                        <path d="M3 3v5h5" />
                                                    </svg>

                                                </button>

                                                <button wire:click="forceDelete({{ $category->id }})"
                                                    wire:confirm="Are you sure want to Deleted?"
                                                    class="ml-2 text-red-600 hover:text-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-octagon-x-icon lucide-octagon-x">
                                                        <path d="m15 9-6 6" />
                                                        <path
                                                            d="M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z" />
                                                        <path d="m9 9 6 6" />
                                                    </svg>

                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="py-4 text-center">No Record Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- model --}}
    @if ($isOpen)
        <div
            class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 min-h-screen animate__animated animate__fadeIn">

            <!-- Modal Box -->
            <div
                class="w-11/12 p-6 mx-auto bg-white rounded-xl shadow-xl md:max-w-md animate__animated animate__zoomIn">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="mb-4 text-xl font-semibold">{{ $isEdit ? 'Edit Category' : 'Add New Category' }}</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        wire:click="closeModal" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x-icon lucide-x cursor-pointer">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>

                </div>
                <form wire:submit.prevent="createCategory">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Category Name
                        </label>

                        <input type="text" wire:model.live="name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Category Name....">

                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Slug
                        </label>

                        <input type="text" wire:model="slug" readonly
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Category Slug....">

                        @error('slug')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 ">
                        <label class="block text-sm font-medium text-gray-700 space-y-2">
                            Status
                        </label>
                        <input type="checkbox" wire:model="status"
                            class="focus:outline-none focus:shadow-none focus:ring-0"> Active
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Meta Title
                        </label>

                        <input type="text" wire:model="meta_title"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Meta Title....">

                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Meta Description
                        </label>

                        <textarea wire:model="meta_description"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Meta Description...."></textarea>

                    </div>


                    <button type="submit" wire:loading.attr="disabled" wire:target="createCategory"
                        wire:loading.class="cursor-not-allowed opacity-50"
                        class="px-4 py-2 font-medium text-white bg-gray-950 rounded-md hover:bg-gray-800 active:scale-95 duration-300 transition-all">
                        <span wire:target="createCategory"
                            wire:loading.remove>{{ $isEdit ? 'Update Category' : 'Save Category' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            wire:loading wire:target="createCategory" stroke-linejoin="round"
                            class="lucide lucide-loader-icon lucide-loader animate-spin">
                            <path d="M12 2v4" />
                            <path d="m16.2 7.8 2.9-2.9" />
                            <path d="M18 12h4" />
                            <path d="m16.2 16.2 2.9 2.9" />
                            <path d="M12 18v4" />
                            <path d="m4.9 19.1 2.9-2.9" />
                            <path d="M2 12h4" />
                            <path d="m4.9 4.9 2.9 2.9" />
                        </svg>
                    </button>
            </div>
            </form>
        </div>
    @endif
</div>
