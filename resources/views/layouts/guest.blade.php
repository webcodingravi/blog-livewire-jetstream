@php
    $setting = App\Models\SystemSetting::firstOrFail();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDescription ?? '' }}">
    <title>{{ $metaTitle ?? $setting->website_name }}</title>
    <link rel="icon" href="{{ asset('storage/uploads/systemSetting/' . $setting->favicon) }}" type="image/x-icon">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <main class="bg-slate-100 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-6xl">
            {{ $slot }}
        </div>
    </main>

    @livewireScripts
</body>

</html>
