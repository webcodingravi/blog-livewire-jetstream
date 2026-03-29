<div>
    <div class="w-11/12 mx-auto py-10 lg:pt-[280px] pt-[120px]">
        {{-- Breadcrumb --}}
        <div class="lg:mb-[110px] mb-[50px] text-gray-500 text-md flex items-center gap-2">
            <a href="{{ route('home') }}" wire:navigate class="hover:text-gray-700 inline-flex items-center">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16 7.609c.352 0 .69.122.96.343l.111.1 6.25 6.25v.001a1.5 1.5 0 0 1 .445 1.071v7.5a.89.89 0 0 1-.891.891H9.125a.89.89 0 0 1-.89-.89v-7.5l.006-.149a1.5 1.5 0 0 1 .337-.813l.1-.11 6.25-6.25c.285-.285.67-.444 1.072-.444Zm5.984 7.876L16 9.5l-5.984 5.985v6.499h11.968z"
                        fill="#475569" stroke="#475569" stroke-width=".094" />
                </svg>

                Home</a> /
            <a href="{{ route('blog', $blog->category->slug) }}" wire:navigate
                class="hover:text-gray-700">{{ $blog->category->name }}</a> /
            <span>{{ $blog->title }}</span>
        </div>


        <div class="flex lg:flex-row flex-col lg:justify-between gap-8 mb-10">
            <div class="lg:w-[70%] w-full">
                {{-- Blog Title --}}
                <a href="">
                    <h1 class="text-3xl font-bold mb-4 text-gray-300">{{ $blog->title }}</h1>
                </a>

                {{-- Meta info --}}
                <div class="flex items-center gap-4 text-gray-500 text-md">
                    <span>By: {{ $blog->user->name }}</span>
                    <span>{{ $blog->created_at->format('d M Y') }}</span>
                </div>

                {{-- Blog Content --}}
                <div class="prose max-w-full mb-8 text-gray-300 rounded">
                    {!! $blog->description !!}
                </div>
            </div>

            <div class="flex-1 ml-10">
                <h2 class="text-2xl font-bold mb-4 text-gray-400">Related Posts</h2>
                <div class="flex flex-col gap-8">
                    @foreach ($retaledBlogs as $post)
                        <div
                            class="flex flex-col gap-2  group cursor-pointer relative border border-gray-700 rounded-lg overflow-hidden bg-white/5 hover:bg-white/10 transition-colors duration-300">
                            <a href="{{ route('blog-details', $post->slug) }}"
                                class="block bg-gray-100 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                                <img src="{{ asset('storage/uploads/posts/' . $post->image) }}"
                                    alt="{{ $post->title }}" class="w-full h-48 object-cover">
                            </a>


                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-200">{{ $post->title }}</h3>
                                <p class="text-gray-500 text-sm mt-2">{{ $post->created_at->format('d M Y') }}</p>
                            </div>

                            <span
                                class="absolute top-3 left-3 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full shadow-md">
                                <a href="{{ route('blog', $blog->category->slug) }}" wire:navigate>
                                    {{ strtoupper($blog->category->name) }}
                                </a>
                            </span>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
