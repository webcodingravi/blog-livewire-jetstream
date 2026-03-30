<div>
    <div
        class="flex flex-col gap-2  group cursor-pointer relative border border-gray-700 rounded-lg overflow-hidden bg-white/5 hover:bg-white/10 transition-colors duration-300">
        <a href="{{ route('blog-details', $blog->slug) }}"
            class="block bg-gray-100 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <img src="{{ asset('storage/uploads/posts/' . $blog->image) }}" alt="{{ $blog->title }}"
                class="w-full h-48 object-cover">
        </a>


        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-200">{{ $blog->title }}</h3>
            <p class="text-gray-500 text-sm mt-2">{{ $blog->created_at->format('d M Y') }}</p>
        </div>

        <span class="absolute top-3 left-3 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full shadow-md">
            <a href="{{ route('blog', $blog->category->slug) }}" wire:navigate>
                {{ strtoupper($blog->category->name) }}
            </a>
        </span>

    </div>



</div>
