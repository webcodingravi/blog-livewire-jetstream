<div>
    <div
        class="min-h-[200px] w-full bg-gradient-to-r from-gray-800 via-gray-800 to-gray-950 text-white rounded-2xl mb-8 p-6 flex flex-col justify-center shadow-lg">

        <h1 class="font-extrabold text-3xl md:text-4xl">
            Dashboard
        </h1>

        <p class="mt-2 text-white/90 text-sm md:text-base">
            Welcome back,@role('admin')
                Admin Panel
                @endrole @role('author')
                Author Panel
            @endrole
        </p>

    </div>
    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        @role('admin')
            <div class="bg-white p-4 rounded-xl shadow">
                <h2 class="text-gray-500">Users</h2>
                <p class="text-2xl font-bold">{{ $totalUsers }}</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <h2 class="text-gray-500">Categories</h2>
                <p class="text-2xl font-bold">{{ $totalCategory }}</p>
            </div>
        @endrole
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-gray-500">Posts</h2>
            <p class="text-2xl font-bold">{{ $totalPost }}</p>
        </div>

    </div>



</div>
