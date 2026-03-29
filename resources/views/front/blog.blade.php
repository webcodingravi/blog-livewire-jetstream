<div>
    <section class="bg-slate-800 lg:pt-[300px] pt-[230px] pb-9">
        <h1 class="text-3xl font-semibold text-center mx-auto text-gray-400">Blogs</h1>
        <p class="text-sm text-slate-500 text-center mt-2 max-w-lg mx-auto">
            Stay ahead of the curve with fresh content on code, design, startups, and everything in between.

        </p>
        <div class="w-11/12 mx-auto flex flex-col-reverse lg:flex-row items-start gap-8 mt-12">

            <div class="w-full lg:w-2/2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @if (count($blogs) > 0)
                    @foreach ($blogs as $index => $blog)
                        <livewire:components.front.blog.blog-list lazy :blog="$blog" :key="$index" />
                    @endforeach
                @else
                    <h1>No Found</h1>
                @endif
            </div>

            <div class="mt-4">
                {{ $blogs->links() }}
            </div>

            <aside
                class="w-full lg:w-1/4 bg-gray-900 p-5 rounded-2xl shadow-2xl flex flex-col gap-10 lg:sticky lg:top-20 ">
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
                            <span wire:click="$set('tagName', '{{ $tag->name }}')"
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

</div>
</section>
</div>
