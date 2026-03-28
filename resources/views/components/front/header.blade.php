<div>
    <header class="bg-gray-950 text-white" x-data="{ menu: false, search: false }">
        <nav class="w-11/12 mx-auto">
            <div class="py-8 flex items-center justify-between">
                <a href="{{ route('home') }}" wire:navigate>
                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo"
                        class="w-20 h-20 object-cover cursor-pointer">
                </a>

                <div class="max-w-3xl w-full relative lg:block hidden">
                    <input type="text"
                        class="py-4 pl-14 pr-3 text-md border rounded-full border-gray-600 bg-transparent w-full placholder:text-gray-800 text-gray-400 font-medium focus:outline-none focus:ring-0 focus:ring-transparent focus:border-gray-600"
                        placeholder="Search News...">
                    <i class="ri-search-line absolute top-4 left-6 text-xl s text-gray-600 "></i>
                </div>


                @if (!auth()->check())
                    <div class="space-x-6 lg:block hidden">
                        <a href="{{ route('login') }}" wire:navigate>
                            <i class="ri-login-circle-fill"></i>
                            Login</a>
                        <a href="{{ route('register') }}" wire:navigate>
                            <i class="ri-admin-line"></i>
                            Register</a>
                    </div>
                @else
                    <div class="flex items-center space-x-3 relative z-[9999]" x-data="{ openDropDown: false }">
                        <span class="text-gray-600">{{ ucFirst(auth()->user()->name) }}</span>
                        <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'https://cdn.vectorstock.com/i/500p/46/76/gray-male-head-placeholder-vector-23804676.jpg' }}"
                            @click="openDropDown=!openDropDown" class="w-10 h-10 rounded-full cursor-pointer"
                            alt="avatar">

                        <div x-cloak @click.outside="openDropDown = false" x-transition x-show="openDropDown"
                            class="absolute top-14 right-3 shadow-lg bg-white  w-[200px] rounded-md flex flex-col gap-2 py-2">
                            <span
                                class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 rounded cursor-pointer px-4 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-user-icon lucide-user">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                {{ ucFirst(auth()->user()->name) }}</span>

                            <span
                                class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 rounded cursor-pointer px-4 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-mail-icon lucide-mail">
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                    <rect x="2" y="4" width="20" height="16" rx="2" />
                                </svg>
                                {{ auth()->user()->email }}</span>

                            @role('admin')
                                <a href="{{ route('admin.dashboard') }}" wire:navigate
                                    class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 rounded cursor-pointer px-4 py-2">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-gauge-icon lucide-gauge">
                                        <path d="m12 14 4-4" />
                                        <path d="M3.34 19a10 10 0 1 1 17.32 0" />
                                    </svg>
                                    Dashbaord</a>
                            @endrole

                            @role('author')
                                <a href="{{ route('author.dashboard') }}" wire:navigate
                                    class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 rounded cursor-pointer px-4 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-gauge-icon lucide-gauge">
                                        <path d="m12 14 4-4" />
                                        <path d="M3.34 19a10 10 0 1 1 17.32 0" />
                                    </svg>
                                    Dashbaord</a>
                            @endrole



                            <form action="{{ route('logout') }}"
                                onsubmit="return confirm('Are you sure want to logout?')" method="POST">
                                @csrf
                                <button
                                    class="text-gray-600 inline-flex gap-2 text-sm hover:bg-gray-100 w-full rounded cursor-pointer px-4 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-log-out-icon lucide-log-out">
                                        <path d="m16 17 5-5-5-5" />
                                        <path d="M21 12H9" />
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="space-x-10 lg:hidden">
                    {{-- mobile search --}}
                    <button @click="search = !search">
                        <i class="ri-search-line text-3xl text-gray-500"></i>
                    </button>
                    {{-- mobile hammer button --}}
                    <button class="text-3xl" @click="menu = true">
                        <i class="ri-menu-3-line"></i>
                    </button>

                </div>

            </div>
            <hr class="border-gray-700 lg:block hidden" />
            <div class="uppercase py-6 space-x-6 text-center lg:block hidden flex-wrap">
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <a href="{{ route('blog', $category->slug) }}" wire:navigate
                            class="hover:text-rose-500">{{ $category->name }}</a>
                    @endforeach
                @endif


            </div>

            {{-- search input --}}
            <div class="absolute right-4 left-4 top-[120px] w-[80%] mx-auto lg:hidden" x-show="search"
                x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="-translate-y-2"
                x-transition:enter-end="translate-y-0">
                <input type="text"
                    class="py-4 ps-12 pr-4 border border-white focus:border-white rounded-full w-full placholder:text-gray-800 text-gray-400 font-medium focus:outline-none focus:ring-0 focus:ring-transparent focus:border-gray-60"
                    placeholder="Search..">
                <i class="ri-search-line absolute top-4 left-5 text-3xl text-gray-600 "></i>
            </div>


            <!-- Overlay -->
            <div x-show="menu" x-transition.opacity class="fixed inset-0 bg-black/60 lg:hidden" @click="menu=false">
            </div>

            {{-- Mobile navbar --}}
            <aside x-show="menu" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                class="fixed top-0 left-0 w-[97%] h-screen bg-gradient-to-r from-gray-900 to-black p-8 lg:hidden z-[999]">
                <div class="flex items-center justify-between mb-8">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo"
                        class="w-20 h-20 object-cover cursor-pointer">

                    <button class="text-2xl" @click="menu = false">
                        <i class="ri-close-large-line"></i>
                    </button>
                </div>

                <div class="flex flex-col space-y-6 uppercase">
                    <a href="">Home</a>
                    <a href="">Culture</a>
                    <a href="">Economy</a>
                    <a href="">Politics</a>
                    <a href="">Science</a>

                    <hr class="border-gray-700">

                    <a href="#">
                        <i class="ri-login-circle-fill pr-2"></i>
                        Login</a>

                    <a href="#">
                        <i class="ri-admin-line pr-2"></i>
                        Register</a>
                </div>
            </aside>

        </nav>

    </header>
</div>
