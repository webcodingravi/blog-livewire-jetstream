<div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">

        <div class="bg-white p-8 rounded-xl shadow-md text-center max-w-md w-full">

            <h2 class="text-2xl font-bold text-gray-800">
                Request Under Review
            </h2>

            <p class="text-gray-500 mt-3">
                Your author request is pending. Please wait for admin approval.
            </p>

            <div class="mt-6">
                <a href="{{ route('home') }}" wire:navigate
                    class="px-5 py-2 bg-indigo-500 text-white rounded-lg hover:opacity-90">
                    Go to Home
                </a>
            </div>

        </div>

    </div>
</div>
