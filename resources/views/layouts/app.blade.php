@php
    $setting = App\Models\SystemSetting::firstOrFail();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDescription ?? '' }}">
    <title>{{ $metaTitle ?? $setting->website_name }}</title>
    <link rel="icon" href="{{ asset('storage/uploads/systemSetting/' . $setting->favicon) }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-slate-800">
    <livewire:components.front.header :setting="$setting" />
    <main>
        {{ $slot }}
    </main>

    {{-- arrow button to scroll top --}}
    <button id="scrollToTopBtn"
        class="fixed bottom-5 right-5 bg-gray-700 text-white p-3 rounded-full shadow-lg hover:bg-gray-600 transition-colors duration-300 hidden">
        <i class="ri-arrow-up-line"></i>
    </button>
    <script>
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                scrollToTopBtn.classList.remove('hidden');
            } else {
                scrollToTopBtn.classList.add('hidden');
            }
        });

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    @livewireScripts
</body>

</html>
