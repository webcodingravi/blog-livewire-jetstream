<div>
    <section class="relative bg-gray-950  flex pt-[200px] overflow-hidden">
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

        <div class="relative z-10 flex flex-col gap-8 max-w-8xl mx-auto ">
            <div class="text-center max-w-6xl">
                <h1 class="text-white text-3xl lg:text-6xl font-bold uppercase mb-3">
                    Bulvinar Neque Laoreet Suspendisse Interdum
                </h1>

                <p class="text-gray-300 text-lg">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>


            @if (count($latestPost) > 0)
                <div class="lg:flex flex-wrap items-center justify-center gap-8 py-16 hidden">
                    <div class="relative group hover:-translate-y-1 transition duration-300">

                        @foreach ($latestPost as $post)
                            <a href="{{ route('blog-details', $post->slug) }}">
                                <!-- Image -->
                                <img class="w-full h-[200px] object-cover rounded-xl"
                                    src="{{ asset('storage/uploads/posts/' . $post->image) }}"
                                    alt="{{ $post->title }}">

                            </a>

                            <span
                                class="absolute top-3 left-3 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full shadow-md">
                                <a href="{{ route('blog', $post->category->slug) }}" wire:navigate>
                                    {{ strtoupper($post->category->name) }}
                                </a>
                            </span>

                            <a href="{{ route('blog-details', $post->slug) }}" wire:navigate>
                                <h3 class="text-base text-slate-300 mt-3">
                                    {{ $post->title }}
                                </h3>
                            </a>
                        @endforeach






                    </div>



                </div>
            @endif

        </div>

    </section>

</div>
