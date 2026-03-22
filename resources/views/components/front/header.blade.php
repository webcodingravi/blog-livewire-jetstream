<div>
    <header class="bg-gray-950 text-white" x-data="{ menu: false, search: false }">
        <nav class="w-11/12 mx-auto">
            <div class="py-8 flex items-center justify-between">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="w-20 h-20 object-cover cursor-pointer">

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
                    <div class="lg:block hidden">
                        <form action="{{ route('logout') }}" onsubmit="return confirm('Are you sure want to logout?')"
                            method="POST">
                            @csrf
                            <button>
                                <i class="ri-login-circle-fill"></i>
                                Logout</button>
                        </form>
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
            <div class="uppercase py-6 space-x-6 text-center lg:block hidden">
                <a href="">Home</a>
                <a href="">Culure</a>
                <a href="">Economy</a>
                <a href="">Politics</a>
                <a href="">Science</a>

            </div>

            {{-- search input --}}
            <div class="absolute right-4 left-4 top-[120px] w-[80%] mx-auto lg:hidden" x-show="search"
                x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="-translate-y-2"
                x-transition:enter-end="translate-y-0">
                <input type="text"
                    class="py-4 ps-12 pr-4 border border-white focus:border-white rounded-full w-full placholder:text-gray-800 text-gray-400 font-medium focus:outline-none focus:ring-0 focus:ring-transparent focus:border-gray-60"
                    placeholder="Search..">
                <i class="ri-search-line absolute top-4 left-5 text-xl text-3xl text-gray-600 "></i>
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
