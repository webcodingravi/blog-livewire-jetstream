<div>
    <livewire:components.front.hero-section />

    <section class="bg-slate-800 py-8 min-h-screen">
        <h1 class="text-3xl font-semibold text-center mx-auto text-gray-400">Blogs</h1>
        <p class="text-sm text-slate-500 text-center mt-2 max-w-lg mx-auto">
            Stay ahead of the curve with fresh content on code, design, startups, and everything in between.
        </p>
        <div class="w-11/12 mx-auto flex flex-col-reverse lg:flex-row items-start gap-8 mt-12">

            <livewire:components.front.blog.blog-list />

            <aside
                class="w-full lg:w-1/4 bg-gray-900 p-5 rounded-2xl shadow-2xl flex flex-col gap-10 lg:sticky lg:top-20 ">
                <!-- 🔍 Search -->
                <div class="flex flex-col gap-3">
                    <h3 class="text-lg font-semibold text-white">Search</h3>

                    <div class="relative">
                        <input type="text" placeholder="Search posts..."
                            class="w-full ps-10 border-gray-700 py-2 rounded-lg bg-gray-700 text-gray-200 placeholder:text-gray-400 focus:outline-none focus:ring-0 focus:ring-gray-700 focus:border-gray-700">

                        <svg class="absolute left-3 top-2.5 text-gray-400" width="18" height="18" fill="none"
                            stroke="currentColor">
                            <circle cx="8" cy="8" r="7"></circle>
                            <line x1="13" y1="13" x2="17" y2="17"></line>
                        </svg>
                    </div>
                </div>

                <!-- 📂 Categories -->
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg font-semibold text-white">Categories</h3>

                    <ul class="flex flex-col gap-2">
                        <li class="flex justify-between text-gray-300 hover:text-white cursor-pointer">
                            <span>PHP</span> <span>(12)</span>
                        </li>
                        <li class="flex justify-between text-gray-300 hover:text-white cursor-pointer">
                            <span>Laravel</span> <span>(8)</span>
                        </li>
                        <li class="flex justify-between text-gray-300 hover:text-white cursor-pointer">
                            <span>JavaScript</span> <span>(5)</span>
                        </li>
                    </ul>
                </div>

                <!-- 🆕 Latest Posts -->
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg font-semibold text-white">Latest Posts</h3>

                    <div class="flex flex-col gap-4">

                        <div class="flex gap-3 items-center group cursor-pointer">
                            <img class="w-16 h-16 object-cover rounded-lg"
                                src="https://images.unsplash.com/photo-1590650516494-0c8e4a4dd67e?w=200&q=80"
                                alt="">
                            <p class="text-sm text-gray-300 group-hover:text-white">
                                UI Design Tips for Beginners
                            </p>
                        </div>

                        <div class="flex gap-3 items-center group cursor-pointer">
                            <img class="w-16 h-16 object-cover rounded-lg"
                                src="https://images.unsplash.com/photo-1714974528646-ea024a3db7a7?w=200&q=80"
                                alt="">
                            <p class="text-sm text-gray-300 group-hover:text-white">
                                Laravel Best Practices
                            </p>
                        </div>

                    </div>
                </div>

                <!-- 🏷️ Tags -->
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg font-semibold text-white">Tags</h3>

                    <div class="flex flex-wrap gap-2">
                        <span
                            class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm hover:bg-indigo-500 hover:text-white cursor-pointer">PHP</span>
                        <span
                            class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm hover:bg-indigo-500 hover:text-white cursor-pointer">Laravel</span>
                        <span
                            class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm hover:bg-indigo-500 hover:text-white cursor-pointer">UI</span>
                        <span
                            class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm hover:bg-indigo-500 hover:text-white cursor-pointer">Design</span>
                    </div>
                </div>

            </aside>

        </div>

</div>
</section>


</div>
