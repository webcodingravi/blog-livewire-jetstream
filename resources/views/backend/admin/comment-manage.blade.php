<div>

    <div class=" py-8  px-4 ">
        <div class=" flex justify-center">
            <x-alert-message />
        </div>
        <div class="flex flex-col lg:flex-row  lg:items-center lg:justify-between">
            <h3 class="text-3xl font-medium text-gray-700">Comments</h3>

            <div class="mt-4 flex lg:flex-row flex-col  lg:items-center gap-4">
                <input type="search" wire:model.live.debounce.500ms="search"
                    class="border border-gray-200 rounded-md py-3 focus:outline-none foucs:ring-0 focus:shadow-none focus:border-gray-200 text-sm w-[300px]"
                    placeholder="Search...">



                <button wire:click="$toggle('showTrashed')"
                    class="flex-inline bg-rose-500 py-3 px-4 rounded-md text-white active:scale-90 duration-300 transition-all text-sm w-fit">
                    {{ $showTrashed ? 'Show Active' : 'Show Trash' }}
                </button>



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
                                    User
                                </th>
                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Post
                                </th>

                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Comment
                                </th>

                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Comment Date
                                </th>
                                <th
                                    class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if (count($comments) > 0)
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td class="p-6 whitespace-nowrap">
                                            <span class="text-sm text-gray-900">

                                                {{ ($comments->currentPage() - 1) * $comments->perPage() + $loop->iteration }}
                                            </span>
                                        </td>

                                        <td class="p-6">
                                            <span class="text-sm text-gray-900">

                                                {{ $comment->user->name }}
                                            </span>
                                        </td>
                                        <td class="p-6 ">
                                            <span class="text-sm text-gray-900">

                                                {{ $comment->post->title }}
                                            </span>
                                        </td>

                                        <td class="p-6 ">
                                            <span class="text-sm text-gray-900">

                                                {{ $comment->comment }}
                                            </span>
                                        </td>




                                        <td class="p-6">
                                            <span class="text-sm text-gray-900">

                                                {{ $comment->created_at->format('d M Y') }}
                                            </span>
                                        </td>
                                        <td class="p-6 text-sm font-medium flex gap-1">

                                            @if (!$showTrashed)
                                                <button wire:click="delete({{ $comment->id }})"
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
                                                <button wire:click="restore({{ $comment->id }})"
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

                                                <button wire:click="forceDelete({{ $comment->id }})"
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
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
