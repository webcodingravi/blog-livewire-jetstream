<div>
    <section class="relative bg-gray-950  flex lg:pt-[350px] pt-[150px]  h-screen">
        <!-- SVG Background -->
        <div class="absolute inset-0 z-0">
            <svg class="w-full h-full" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg">
                <path fill="#1f2937" fill-opacity="0.4">
                    <animate attributeName="d" dur="10s" repeatCount="indefinite"
                        values="
                    M0,300 C300,400 1100,200 1440,300 L1440,0 L0,0 Z;
                    M0,250 C400,350 1000,150 1440,280 L1440,0 L0,0 Z;
                    M0,300 C300,400 1100,200 1440,300 L1440,0 L0,0 Z
                    ">
                    </animate>
                </path>
            </svg>
        </div>

        <div class="relative z-10 flex flex-col gap-8 max-w-6xl mx-auto ">
            <div class="text-center max-w-6xl">
                <h1 class="text-white text-3xl lg:text-6xl font-bold uppercase mb-3">
                    Welcome to Our Blog
                </h1>

                <p class="text-gray-300 text-lg max-w-2xl mx-auto">
                    Dive into a world of insights, stories, and inspiration. Explore our latest articles and stay
                    updated with the trends in technology, lifestyle, and more.
                </p>
            </div>



            <div class="grid gird-cols-1 lg:grid-cols-3 gap-8 py-16 lg:px-0 px-4">
                @if (count($latestPost) > 0)
                    @foreach ($latestPost as $index => $blog)
                        <livewire:components.front.blog.blog-list lazy :blog="$blog" :key="$index" />
                    @endforeach
                @else
                    <h1>No Found</h1>
                @endif

            </div>


        </div>

    </section>

</div>
