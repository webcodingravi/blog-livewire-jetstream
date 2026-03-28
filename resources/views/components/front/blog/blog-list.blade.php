<div>
    <div class="relative group hover:-translate-y-1 transition duration-300">
        <!-- Image -->
        <a href="{{ route('blog-details', $blog->slug) }}" wire:navigate><img class="w-full h-[300px] object-cover rounded-xl"
                src="{{ asset('storage/uploads/posts/' . $blog->image) }}" alt="{{ $blog->title }}"></a>

        <!-- Category Badge -->
        <span class="absolute top-3 left-3 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full shadow-md">
            <a href="{{ route('blog', $blog->category->slug) }}" wire:navigate>
                {{ strtoupper($blog->category->name) }}
            </a>
        </span>

        <!-- Title -->
        <h3 class="text-base text-slate-300 mt-3">
            <a href="{{ route('blog-details', $blog->slug) }}" wire:navigate>{{ $blog->title }}</a>
        </h3>

    </div>

</div>
