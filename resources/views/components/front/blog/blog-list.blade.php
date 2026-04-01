<div>
    <div
        class="flex flex-col gap-2 min-h-[350px]  group cursor-pointer relative border border-gray-700 rounded-lg overflow-hidden bg-white/5 hover:bg-white/10 transition-colors duration-300">
        <a href="{{ route('blog-details', $blog->slug) }}" wire:navigate
            class="block bg-gray-100 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <img src="{{ asset('storage/uploads/posts/' . $blog->image) }}" alt="{{ $blog->title }}"
                class="w-full h-48 object-cover">

        </a>


        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-200">{{ $blog->title }}</h3>
            <p class="text-gray-500 text-sm mt-2">{{ $blog->created_at->format('d M Y') }}</p>
            <span class="inline-flex gap-1 mt-4 text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-eye-icon lucide-eye">
                    <path
                        d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
                {{ $blog->views }}
            </span>
        </div>

        <span class="absolute top-3 left-3 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full shadow-md">
            <a href="{{ route('blog', $blog->category->slug) }}" wire:navigate>
                {{ strtoupper($blog->category->name) }}
            </a>

        </span>



    </div>



</div>
