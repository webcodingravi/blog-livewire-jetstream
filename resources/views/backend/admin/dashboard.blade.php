<div>
    <div
        class="min-h-[200px] w-full bg-gradient-to-r from-gray-800 via-gray-800 to-gray-950 text-white rounded-2xl mb-8 p-6 flex flex-col justify-center shadow-lg">

        <h1 class="font-extrabold text-3xl md:text-4xl">
            Dashboard
        </h1>

        <p class="mt-2 text-white/90 text-sm md:text-base">
            Welcome back, Admin Panel
        </p>

    </div>
    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-gray-500">Users</h2>
            <p class="text-2xl font-bold">1,200</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-gray-500">Orders</h2>
            <p class="text-2xl font-bold">320</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-gray-500">Revenue</h2>
            <p class="text-2xl font-bold">$8,400</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-gray-500">Visits</h2>
            <p class="text-2xl font-bold">15K</p>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Role</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="p-3">John Doe</td>
                    <td class="p-3">john@example.com</td>
                    <td class="p-3">Admin</td>
                    <td class="p-3 text-green-500">Active</td>
                </tr>
                <tr class="border-t">
                    <td class="p-3">Jane Smith</td>
                    <td class="p-3">jane@example.com</td>
                    <td class="p-3">Editor</td>
                    <td class="p-3 text-yellow-500">Pending</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
