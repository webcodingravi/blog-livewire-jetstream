<div>
    <div class="w-11/12 mx-auto py-10 lg:pt-[280px] pt-[120px]">
        {{-- Breadcrumb --}}
        <div class="lg:mb-[40px] mb-[50px] text-gray-500 text-md flex items-center gap-2">
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

            <aside class="flex-1 bg-gray-900 p-5 rounded-2xl shadow-2xl flex flex-col gap-10 lg:sticky lg:top-20 h-fit">
                <!-- 📂 Categories -->
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg font-semibold text-white">Categories</h3>

                    @if (count($categories) > 0)
                        <ul class="flex flex-col gap-2">
                            @foreach ($categories as $category)
                                <a href="{{ route('blog', $category->slug) }}"
                                    class="flex justify-between text-gray-300 hover:text-white cursor-pointer">
                                    <span>{{ $category->name }}</span> <span>({{ $category->post->count() }})</span>
                                </a>
                            @endforeach


                        </ul>
                    @endif
                </div>

                <!-- 🆕 Latest Posts -->
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg font-semibold text-white">Latest Posts</h3>

                    <div class="flex flex-col gap-4">

                        @if (count($latestPost) > 0)
                            @foreach ($latestPost as $post)
                                <div class="flex gap-3 items-center group cursor-pointer">
                                    <a href="{{ route('blog-details', $post->slug) }}">
                                        <img class="w-16 h-16 object-cover rounded-lg"
                                            src="{{ asset('storage/uploads/posts/' . $post->image) }}"
                                            alt="{{ $post->title }}">
                                    </a>
                                    <p class="text-sm text-gray-300 group-hover:text-white">
                                        <a href="{{ route('blog-details', $post->slug) }}" wire:navigate>
                                            {{ $post->title }}
                                        </a>
                                    </p>
                                </div>
                            @endforeach
                        @endif



                    </div>
                </div>

                <!-- 🏷️ Tags -->
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg font-semibold text-white">Tags</h3>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <span wire:click="filterByTag('{{ $tag->name }}')"
                                class="px-3
                                py-1 bg-gray-700 text-gray-300 rounded-full text-sm hover:bg-indigo-500 hover:text-white
                                cursor-pointer">{{ $tag->name }}
                                ({{ $tag->posts_count }})
                            </span>
                        @endforeach


                    </div>
                </div>

            </aside>



        </div>

        {{-- related post --}}

        @if (count($retaledBlogs) > 0)

            <div class="mt-10">
                <h2 class="text-2xl font-bold mb-4 text-gray-400">Related Posts</h2>
                <div class="grid grid-cols-1  lg:grid-cols-4 gap-8">

                    @if (count($retaledBlogs) > 0)
                        @foreach ($retaledBlogs as $index => $blog)
                            <livewire:components.front.blog.blog-list lazy :blog="$blog" :key="$index" />
                        @endforeach
                    @else
                        <h1>No Found</h1>
                    @endif
                </div>

            </div>


        @endif


        {{-- comment blog --}}

        @can('create_comment')
            <div class="mt-20 lg:w-[70%] w-full">
                <h2 class="text-2xl font-bold mb-4 text-gray-400">Comments({{ $comments->count() }})</h2>
                <p class="text-gray-500">No comments yet. Be the first to comment!</p>
                <div class="mt-6  p-4 rounded-md">
                    @foreach ($comments as $comment)
                        <div class="bg-gray-800 p-4 rounded-md mb-4">
                            <div class="flex items-center gap-3 mb-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white text-sm">
                                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                </div>
                                <span class="text-gray-300 font-semibold">{{ $comment->user->name }}</span>
                                <span class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-400">{{ $comment->comment }}</p>
                        </div>
                    @endforeach

                </div>
                <div class="my-4">
                    <x-alert-message />
                </div>

                <div class="bg-slate-500 p-4 rounded-md mt-4">
                    <form wire:submit.prevent="submitComment">
                        <div>
                            <textarea wire:model="comment" cols="5" rows="5"
                                class="w-full rounded-lg p-4 bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-300"
                                placeholder="Comment..."></textarea>
                            @error('comment')
                                <span class="text-red-800">{{ $message }}</span>
                            @enderror
                        </div>
                        <button wire:loading.class="opacity-50 cursor-not-allowed" wire:target="submitComment"
                            class="mt-2 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            <span wire:loading.remove wire:target="submitComment">Submit Comment</span>
                            <span wire:loading wire:target="submitComment">Submitting...</span>
                        </button>

                    </form>
                </div>
            </div>
        @endcan
    </div>

</div>
