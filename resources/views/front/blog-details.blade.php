<div>
    <div class="w-11/12 mx-auto py-10 ">

        {{-- Breadcrumb --}}
        <div class="mb-6 text-gray-500 text-md flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-gray-700 inline-flex items-center">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16 7.609c.352 0 .69.122.96.343l.111.1 6.25 6.25v.001a1.5 1.5 0 0 1 .445 1.071v7.5a.89.89 0 0 1-.891.891H9.125a.89.89 0 0 1-.89-.89v-7.5l.006-.149a1.5 1.5 0 0 1 .337-.813l.1-.11 6.25-6.25c.285-.285.67-.444 1.072-.444Zm5.984 7.876L16 9.5l-5.984 5.985v6.499h11.968z"
                        fill="#475569" stroke="#475569" stroke-width=".094" />
                </svg>

                Home</a> /
            <a href="{{ route('blog', $blog->category->slug) }}"
                class="hover:text-gray-700">{{ $blog->category->name }}</a> /
            <span>{{ $blog->title }}</span>
        </div>

        {{-- Blog Title --}}
        <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $blog->title }}</h1>

        {{-- Meta info --}}
        <div class="flex items-center gap-4 text-gray-500 text-md mb-6">
            <span>By: {{ $blog->user->name }}</span>
            <span>{{ $blog->created_at->format('d M Y') }}</span>
        </div>

        {{-- Featured Image --}}
        @if ($blog->image)
            <img src="{{ asset('storage/uploads/posts/' . $blog->image) }}" alt="{{ $blog->title }}"
                class="w-full h-auto rounded mb-6">
        @endif

        {{-- Blog Content --}}
        <div class="prose max-w-full mb-8">
            {!! $blog->description !!}
        </div>

    </div>
</div>
