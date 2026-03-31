<div>
    <header class="bg-white shadow py-4 px-8 flex items-center justify-between">
        <button onclick="toggleSidebar()" class="md:hidden text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-text-align-justify-icon lucide-text-align-justify">
                <path d="M3 5h18" />
                <path d="M3 12h18" />
                <path d="M3 19h18" />
            </svg>
        </button>
        <div></div>



        <div class="flex items-center space-x-3 relative" x-data="{ openDropDown: false }">
            @role('admin')
                <livewire:components.backend.admin-notification-bell />
            @endrole

            <span class="text-gray-600">{{ ucFirst(auth()->user()->name) }}</span>
            <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'https://cdn.vectorstock.com/i/500p/46/76/gray-male-head-placeholder-vector-23804676.jpg' }}"
                @click="openDropDown=!openDropDown" class="w-10 h-10 rounded-full cursor-pointer" alt="avatar">

            <div x-cloak @click.outside="openDropDown = false" x-transition x-show="openDropDown"
                class="absolute top-14 right-3 shadow-lg bg-white  w-[200px] rounded-md flex flex-col gap-2 py-2">
                <span
                    class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 rounded cursor-pointer px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    {{ ucFirst(auth()->user()->name) }}</span>


                <span
                    class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 rounded cursor-pointer px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                        <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                        <rect x="2" y="4" width="20" height="16" rx="2" />
                    </svg>
                    {{ auth()->user()->email }}</span>

                <button wire:click="$dispatch('openEditProfile')"
                    class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 rounded cursor-pointer px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-pen-icon lucide-user-pen">
                        <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                        <path
                            d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                        <circle cx="10" cy="7" r="4" />
                    </svg>
                    Edit Profile</button>



                <form action="{{ route('logout') }}" onsubmit="return confirm('Are you sure want to logout?')"
                    method="POST">
                    @csrf
                    <button
                        class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 w-full rounded cursor-pointer px-4 py-2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                            <path d="m16 17 5-5-5-5" />
                            <path d="M21 12H9" />
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        </svg>
                        Logout

                    </button>
                </form>
            </div>
        </div>
    </header>

    <livewire:components.backend.account-setting />
</div>
