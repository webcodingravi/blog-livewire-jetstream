<div>
    <div id="sidebar"
        class="min-h-screen fixed bg-black/50 left-0 w-64 bg-gray-950 text-white transform -translate-x-full md:translate-x-0 md:static md:inset-0 transition duration-300 z-30 ">
        <div class="lg:p-2 px-7 py-2  border-b border-gray-700 lg:ps-6 flex justify-between items-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo.png') }}" class="w-20 h-20">
            </a>

        </div>
        <nav class="p-4 space-y-2" wire:navigate id="closeBtn">
            @role('admin')
                <a href="{{ route('admin.dashboard') }}" wire:navigate
                    class="px-3 py-2 rounded hover:bg-gray-700 inline-flex gap-2 w-full {{ Request::segment(2) === 'dashboard' ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-gauge-icon lucide-gauge">
                        <path d="m12 14 4-4" />
                        <path d="M3.34 19a10 10 0 1 1 17.32 0" />
                    </svg>
                    Dashboard</a>
            @endrole

            @role('author')
                <a href="{{ route('author.dashboard') }}" wire:navigate
                    class="px-3 py-2 rounded hover:bg-gray-700 inline-flex gap-2 w-full {{ Request::segment(2) === 'dashboard' ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-gauge-icon lucide-gauge">
                        <path d="m12 14 4-4" />
                        <path d="M3.34 19a10 10 0 1 1 17.32 0" />
                    </svg>
                    Dashboard</a>
            @endrole


            @can('manage_users')
                <a href="{{ route('admin.users') }}" wire:navigate
                    class="inline-flex gap-2 px-3 py-2 rounded hover:bg-gray-700 w-full {{ Request::segment(2) === 'users' ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users-round-icon lucide-users-round">
                        <path d="M18 21a8 8 0 0 0-16 0" />
                        <circle cx="10" cy="8" r="5" />
                        <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                    </svg>
                    Users</a>
            @endcan

            @can('manage_categories')
                <a href="{{ route('admin.category') }}" wire:navigate
                    class="inline-flex gap-2 px-3 py-2 rounded hover:bg-gray-700 w-full {{ Request::segment(2) === 'categories' ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chart-bar-stacked-icon lucide-chart-bar-stacked">
                        <path d="M11 13v4" />
                        <path d="M15 5v4" />
                        <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                        <rect x="7" y="13" width="9" height="4" rx="1" />
                        <rect x="7" y="5" width="12" height="4" rx="1" />
                    </svg>
                    Categories</a>
            @endcan

            @role('admin')
                <a href="{{ route('admin.post') }}" wire:navigate
                    class="inline-flex gap-2 px-3 py-2 rounded hover:bg-gray-700 w-full {{ Request::segment(2) === 'posts' ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-folder-open-icon lucide-folder-open">
                        <path
                            d="m6 14 1.5-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.54 6a2 2 0 0 1-1.95 1.5H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H18a2 2 0 0 1 2 2v2" />
                    </svg>
                    Posts</a>
            @endrole

            @role('author')
                <a href="{{ route('author.post') }}" wire:navigate
                    class="inline-flex gap-2 px-3 py-2 rounded hover:bg-gray-700 w-full {{ Request::segment(2) === 'posts' ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-folder-open-icon lucide-folder-open">
                        <path
                            d="m6 14 1.5-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.54 6a2 2 0 0 1-1.95 1.5H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H18a2 2 0 0 1 2 2v2" />
                    </svg>
                    Posts</a>
            @endrole

            @can('manage_settings')
                <a href="{{ route('admin.settings') }}" wire:navigate
                    class="inline-flex gap-2 w-full px-3 py-2 rounded hover:bg-gray-700 {{ Request::segment(2) === 'settings' ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-monitor-cog-icon lucide-monitor-cog">
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
                    </svg>
                    Settings</a>
            @endcan
        </nav>
    </div>
</div>
