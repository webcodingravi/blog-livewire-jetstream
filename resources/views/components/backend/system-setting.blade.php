<div>

    <div class="inline-flex gap-2 items-center font-medium text-gray-800 mb-8"> <svg xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-monitor-cog-icon lucide-monitor-cog">
            <path d="M12 17v4" />
            <path d="m14.305 7.53.923-.382" />
            <path d="m15.228 4.852-.923-.383" />
            <path d="m16.852 3.228-.383-.924" />
            <path d="m16.852 8.772-.383.923" />
            <path d="m19.148 3.228.383-.924" />
            <path d="m19.53 9.696-.382-.924" />
            <path d="m20.772 4.852.924-.383" />
            <path d="m20.772 7.148.924.383" />
            <path d="M22 13v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7" />
            <path d="M8 21h8" />
            <circle cx="18" cy="6" r="3" />
        </svg>System Setting</div>
    <form wire:submit.prevent="systemSettingSave" enctype="multipart/form-data">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Website Name
            </label>

            <input type="text" wire:model="website_name"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Website Name....">
            @error('website_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <label
            class="relative w-full h-40 flex flex-col items-center justify-center border border-dashed rounded-md cursor-pointer"
            x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

            <input type="file" wire:model="logo" class="hidden" accept="image/jpg,image/jpeg,image/png,image/gif" />

            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" stroke="currentColor"
                stroke-width="2" class="w-12 h-12 text-gray-400">
                <path d="M12 13v8" />
                <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                <path d="m8 17 4-4 4 4" />
            </svg>

            <span class="text-sm text-gray-500 mt-2">Upload Logo</span>

            <div x-show="uploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>

        </label>


        <div class="mb-8">
            @if ($logo)
                <img src="{{ $logo->temporaryUrl() }}" class="w-32 mt-2">
            @elseif ($oldLogo)
                <img src="{{ asset('storage/uploads/systemSetting/' . $oldLogo) }}" class="w-32 mt-2">
            @endif

        </div>



        <label
            class="relative w-full h-40 flex flex-col items-center justify-center border border-dashed rounded-md cursor-pointer"
            x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">


            <input type="file" wire:model="favicon" class="hidden"
                accept="image/jpg,image/jpeg,image/png,image/gif" />

            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" stroke="currentColor"
                stroke-width="2" class="w-12 h-12 text-gray-400">
                <path d="M12 13v8" />
                <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                <path d="m8 17 4-4 4 4" />
            </svg>

            <span class="text-sm text-gray-500 mt-2">Upload Favicon</span>

            <div x-show="uploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>

        </label>

        <div class="mb-8">
            @if ($favicon)
                <img src="{{ $favicon->temporaryUrl() }}" class="w-32 mt-2">
            @elseif ($oldFavicon)
                <img src="{{ asset('storage/uploads/systemSetting/' . $oldFavicon) }}" class="w-32 mt-2">
            @endif
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Address
            </label>

            <textarea rows="4" cols="4" wire:model="address" placeholder="Enter Address..."
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" "></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Mobile Number
            </label>

            <input type="number" wire:model="mobile_no"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Mobile Number....">
            @error('mobile_no')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                email
            </label>

            <input type="text" wire:model="email"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="email....">

            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>




        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Facebook Link
            </label>

            <input type="text" wire:model="facebook_link"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="facebook_link....">
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Instagram Link
            </label>

            <input type="text" wire:model="instagram_link"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="instagram_link....">
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Twitter link
            </label>

            <input type="text" wire:model="twitter_link"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Twitter link....">
        </div>


        <button type="submit" wire:loading.attr="disabled" wire:target="systemSettingSave"
            wire:loading.class="cursor-not-allowed opacity-50"
            class="px-4 py-2 font-medium text-white bg-gray-950 rounded-md hover:bg-gray-800 active:scale-95 duration-300 transition-all">
            <span wire:target="systemSettingSave" wire:loading.remove>Update Setting</span>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" wire:loading
                wire:target="systemSettingSave" stroke-linejoin="round"
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
