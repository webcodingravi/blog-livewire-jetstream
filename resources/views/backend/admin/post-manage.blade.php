   <div>
       <style>
           .fr-wrapper {
               min-height: 250px !important;
           }
       </style>

       <div class=" py-8  w-full px-4">
           <div class=" flex justify-center">
               <x-alert-message />
           </div>
           <div class="flex lg:flex-row flex-col items-center lg:justify-between">
               <h3 class="text-3xl font-medium text-gray-700">All Posts</h3>

               <div class="mt-4 flex lg:flex-row flex-col items-center gap-4">

                   <input type="search" wire:model.live.debounce.500ms="search"
                       class="border border-gray-200 rounded-md py-3 focus:outline-none focus:ring-0 focus:shadow-none focus:border-gray-200 text-sm w-[300px]"
                       placeholder="Search...">

                   <button wire:click="export" wire:navigate
                       class="inline-flex bg-green-500 py-3 px-4 rounded-md text-white active:scale-90 duration-300 transition-all text-sm">
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
                       class="inline-flex bg-rose-500 py-3 px-4 rounded-md text-white active:scale-90 duration-300 transition-all text-sm">
                       {{ $showTrashed ? 'Show Active' : 'Show Trash' }}
                   </button>

                   <select
                       class="rounded-md border-gray-200 focus:outline-none focus:ring-0 focus:shadow-none focus:border-gray-200 cursor-pointer"
                       wire:model.live.debounce.500ms= "filterStatus">
                       <option value="">All</option>
                       <option value="draft">Draft</option>
                       <option value="published">Published</option>
                   </select>

                   <button wire:click="openModal"
                       class="text-sm px-4 py-3 font-medium text-white bg-gray-950 rounded-md hover:bg-gray-800 active:scale-95 duration-300 transition-all inline-flex gap-2">
                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus">
                           <circle cx="12" cy="12" r="10" />
                           <path d="M8 12h8" />
                           <path d="M12 8v8" />
                       </svg>Add New
                       Post</button>

               </div>

           </div>



           <div class="flex flex-col mt-8">
               <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                   <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                       <table class="min-w-full border">
                           <thead>
                               <tr>
                                   <th
                                       class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                       S.NO.
                                   </th>
                                   <th
                                       class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                       Post
                                   </th>
                                   <th
                                       class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                       Slug
                                   </th>

                                   <th
                                       class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                       Category
                                   </th>

                                   <th
                                       class="p-6 text-xs font-medium tracking-wider text-left text-gray-200 uppercase bg-gray-700">
                                       Created By
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
                               @if (count($posts) > 0)
                                   @foreach ($posts as $post)
                                       <tr>
                                           <td class="p-6 whitespace-nowrap">
                                               <span class="text-sm text-gray-900">

                                                   {{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}
                                               </span>
                                           </td>

                                           <td class="p-6 flex gap-4 items-center">
                                               <img src="{{ asset('storage/uploads/posts/' . $post->image) }}"
                                                   alt="{{ $post->title }}" class="w-10 h-10 rounded-md object-cover">
                                               <span class="text-sm text-gray-900">

                                                   {{ $post->title }}
                                               </span>
                                           </td>
                                           <td class="p-6 ">
                                               <span class="text-sm text-gray-900">

                                                   {{ $post->slug }}
                                               </span>
                                           </td>

                                           <td class="p-6">
                                               <span class="text-sm text-gray-900">

                                                   {{ $post->category->name }}
                                               </span>
                                           </td>

                                           <td class="p-6 ">
                                               <span class="text-sm text-gray-900">

                                                   {{ $post->user->name }}
                                               </span>
                                           </td>

                                           <td class="p-6">
                                               @if ($post->status === 'draft')
                                                   <span
                                                       class='text-sm bg-rose-100 text-rose-800 rounded-full px-3 py-1'>Draft</span>
                                               @elseif ($post->status === 'published')
                                                   <span
                                                       class='text-sm text-green-900 bg-green-100 rounded-full px-3 py-1'>
                                                       Published</span>
                                               @endif

                                           </td>


                                           <td class="p-6">
                                               <span class="text-sm text-gray-900">

                                                   {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}
                                               </span>
                                           </td>
                                           <td class="p-6 text-sm font-medium flex gap-1">
                                               <button wire:click="edit({{ $post->id }})"
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
                                                   <button wire:click="delete({{ $post->id }})"
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
                                                   <button wire:click="restore({{ $post->id }})"
                                                       class="ml-2 text-info-600 hover:text-info-900">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                           height="20" viewBox="0 0 24 24" fill="none"
                                                           stroke="currentColor" stroke-width="2"
                                                           stroke-linecap="round" stroke-linejoin="round"
                                                           class="lucide lucide-rotate-ccw-icon lucide-rotate-ccw">
                                                           <path
                                                               d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                                                           <path d="M3 3v5h5" />
                                                       </svg>

                                                   </button>

                                                   <button wire:click="forceDelete({{ $post->id }})"
                                                       wire:confirm="Are you sure want to Deleted?"
                                                       class="ml-2 text-red-600 hover:text-red-900">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                           height="20" viewBox="0 0 24 24" fill="none"
                                                           stroke="currentColor" stroke-width="2"
                                                           stroke-linecap="round" stroke-linejoin="round"
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
                                       <td colspan="8" class="py-4 text-center">No Record Found</td>
                                   </tr>
                               @endif
                           </tbody>
                       </table>
                       <div class="mt-4">
                           {{ $posts->links() }}
                       </div>
                   </div>
               </div>
           </div>
       </div>


       {{-- model --}}
       @if ($isOpen)
           <div
               class="fixed inset-0 z-[9999] flex items-start justify-center py-10 overflow-y-auto bg-black/50 min-h-screen animate__animated animate__fadeIn">

               <!-- Modal Box -->
               <div
                   class="w-11/12 p-6 mx-auto bg-white rounded-xl shadow-xl md:max-w-6xl max-h-[90vh] overflow-y-auto animate__animated animate__zoomIn">

                   <div class="flex justify-between items-center mb-4 ">
                       <h3 class="mb-4 text-xl font-semibold">{{ $isEdit ? 'Edit Post' : 'Add Post' }}</h3>
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                           wire:click="closeModal" fill="none" stroke="currentColor" stroke-width="2"
                           stroke-linecap="round" stroke-linejoin="round"
                           class="lucide lucide-x-icon lucide-x cursor-pointer">
                           <path d="M18 6 6 18" />
                           <path d="m6 6 12 12" />
                       </svg>

                   </div>
                   <form wire:submit.prevent="createPost" enctype="multipart/form-data">
                       <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-8">
                           <div>
                               <label class="block text-sm font-medium text-gray-700">
                                   Title
                               </label>

                               <input type="text" wire:model.live="title"
                                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   placeholder="Post Title....">

                               @error('title')
                                   <span class="text-red-500 text-sm">{{ $message }}</span>
                               @enderror
                           </div>

                           <div>
                               <label class="block text-sm font-medium text-gray-700">
                                   Slug
                               </label>

                               <input type="text" wire:model="slug" readonly
                                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   placeholder="Post Slug....">

                               @error('slug')
                                   <span class="text-red-500 text-sm">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>


                       <div class="mb-4">
                           <label class="block text-sm font-medium text-gray-700">
                               Category
                           </label>

                           <select wire:model="category_id"
                               class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                               <option value="">--Category Select---</option>
                               @foreach ($categories as $category)
                                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                               @endforeach

                           </select>
                           @error('category_id')
                               <span class="text-red-500 text-sm">{{ $message }}</span>
                           @enderror
                       </div>


                       <label
                           class="relative w-full h-40 flex flex-col items-center justify-center border border-dashed rounded-md cursor-pointer"
                           x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                           x-on:livewire-upload-finish="uploading = false"
                           x-on:livewire-upload-cancel="uploading = false"
                           x-on:livewire-upload-error="uploading = false"
                           x-on:livewire-upload-progress="progress = $event.detail.progress">

                           <input type="file" wire:model="image" class="hidden"
                               accept="image/jpg,image/jpeg,image/png,image/gif" />

                           <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none"
                               stroke="currentColor" stroke-width="2" class="w-12 h-12 text-gray-400">
                               <path d="M12 13v8" />
                               <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                               <path d="m8 17 4-4 4 4" />
                           </svg>

                           <span class="text-sm text-gray-500 mt-2">Upload Image</span>

                           <div x-show="uploading">
                               <progress max="100" x-bind:value="progress"></progress>
                           </div>

                       </label>

                       <div class="mb-8">
                           @if ($image)
                               <img src="{{ $image->temporaryUrl() }}" class="w-32 mt-2">
                           @elseif ($oldImage)
                               <img src="{{ asset('storage/uploads/posts/' . $oldImage) }}" class="w-32 mt-2">
                           @endif
                       </div>

                       <<div class="mb-4" x-data x-init="let oldImages = [];

                       function getImages(html) {
                           let div = document.createElement('div');
                           div.innerHTML = html;
                           return Array.from(div.querySelectorAll('img')).map(img => img.src);
                       }

                       const editor2 = new FroalaEditor('#description', {
                           imageUploadURL: '{{ route('api.blog.image-upload') }}',
                           imageUploadParam: 'image',
                           imageUploadParams: { _token: '{{ csrf_token() }}' },

                           events: {
                               initialized: function() {
                                   oldImages = getImages(this.html.get());
                               },

                               contentChanged: function() {
                                   let currentImages = getImages(this.html.get());

                                   // deleted images find karo
                                   let deletedImages = oldImages.filter(img => !currentImages.includes(img));

                                   if (deletedImages.length > 0) {
                                       deletedImages.forEach(url => {
                                           console.log('Deleting:', url);

                                           fetch('{{ route('api.blog.image-delete') }}', {
                                                   method: 'POST',
                                                   headers: {
                                                       'Content-Type': 'application/json',
                                                       'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                   },
                                                   body: JSON.stringify({ url: url })
                                               })
                                               .then(res => res.json())
                                               .then(res => console.log(res));
                                       });
                                   }

                                   oldImages = currentImages;

                                   @this.set('description', this.html.get());
                               },

                               imageInserted: function($img) {
                                   $img.setAttribute('data-server-url', $img.src);
                               }
                           }
                       });

                       // edit mode ke liye
                       setTimeout(() => {
                           editor2.html.set(@js($description));

                           // initial images capture karo
                           oldImages = getImages(@js($description));
                       }, 100);" wire:ignore>
                           <label class="block text-sm font-medium text-gray-700">
                               Description
                           </label>

                           <div id="description"></div>

               </div>



               <div class="mb-4" x-data="tagsInput()">
                   <label class="block text-sm font-medium text-gray-700">
                       Tags
                   </label>

                   <!-- Input field -->
                   <input type="text" placeholder="Add tag & press Enter" x-model="newTag"
                       @keydown.enter.prevent="addTag()"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />

                   <!-- Existing tags -->
                   <div class="flex gap-2 flex-wrap">
                       <template x-for="(tag, index) in tags" :key="index">
                           <div class="bg-blue-500  text-white px-2 py-1 rounded flex items-center gap-1 mt-2">
                               <span x-text="tag"></span>
                               <button type="button" @click="removeTag(index)">×</button>
                           </div>
                       </template>
                   </div>

               </div>

               <div class="mb-4 ">
                   <label class="block text-sm font-medium text-gray-700 space-y-2">
                       Status
                   </label>
                   <select
                       class="w-full mt-1 border-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-0 focus:border-gray-200"
                       wire:model="status">
                       <option value="draft">Draft</option>
                       <option value="published">Published</option>
                   </select>

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

               <button type="submit" wire:loading.attr="disabled" wire:target="createPost"
                   wire:loading.class="cursor-not-allowed opacity-50"
                   class="px-4 py-2 font-medium text-white bg-gray-950 rounded-md hover:bg-gray-800 active:scale-95 duration-300 transition-all">
                   <span wire:target="createPost"
                       wire:loading.remove>{{ $isEdit ? 'Update Post' : 'Save Post' }}</span>

                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" wire:loading
                       wire:target="createPost" stroke-linejoin="round"
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
               </form>
           </div>

   </div>


   @endif
   </div>

   @push('script')
       <script>
           function tagsInput() {
               return {
                   tags: @entangle('tags'), // Livewire property
                   newTag: '',
                   addTag() {
                       if (this.newTag.trim() !== '' && !this.tags.includes(this.newTag.trim())) {
                           this.tags.push(this.newTag.trim());
                           this.newTag = '';
                       }
                   },
                   removeTag(index) {
                       this.tags.splice(index, 1);
                   }
               }
           }
       </script>
   @endpush
