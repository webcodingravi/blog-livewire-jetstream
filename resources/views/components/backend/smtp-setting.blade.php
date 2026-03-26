<div>
    <div class="inline-flex gap-2 items-center font-medium text-gray-800 mb-8"> <svg xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-monitor-cog-icon lucide-monitor-cog">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-cog-icon lucide-cog">
                <path d="M11 10.27 7 3.34" />
                <path d="m11 13.73-4 6.93" />
                <path d="M12 22v-2" />
                <path d="M12 2v2" />
                <path d="M14 12h8" />
                <path d="m17 20.66-1-1.73" />
                <path d="m17 3.34-1 1.73" />
                <path d="M2 12h2" />
                <path d="m20.66 17-1.73-1" />
                <path d="m20.66 7-1.73 1" />
                <path d="m3.34 17 1.73-1" />
                <path d="m3.34 7 1.73 1" />
                <circle cx="12" cy="12" r="2" />
                <circle cx="12" cy="12" r="8" />
            </svg>
        </svg>SMTP Setting</div>


    <form>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Category Name
            </label>

            <input type="text"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Category Name....">

            {{-- @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror --}}
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Slug
            </label>

            <input type="text" wire:model="slug" readonly
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Category Slug....">

            {{-- @error('slug')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror --}}
        </div>





        <button type="submit"
            class="px-4 py-2 font-medium text-white bg-gray-950 rounded-md hover:bg-gray-800 active:scale-95 duration-300 transition-all">
            Update Setting

        </button>
</div>
</form>
</div>
