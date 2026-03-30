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
       <link rel="icon" href="{{ asset('storage/uploads/systemSetting/' . $setting->favicon) }}"
           type="image/x-icon">

       <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet"
           type="text/css" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


       @stack('style')
       @vite(['resources/css/admin/app.css', 'resources/js/admin/app.js'])
       @livewireStyles

   </head>

   <body>
       <div class="flex min-h-screen">

           <!-- Sidebar -->

           <x-backend.sidebar :setting="$setting" />
           <!-- Overlay -->

           <!-- Main Content -->
           <div class="flex-1 flex flex-col bg-gray-50">
               <!-- Header -->
               <livewire:components.backend.header : />

               <!-- Content Area -->
               <main class="p-4 flex-1 w-full overflow-hidden">
                   {{ $slot }}
               </main>
           </div>
       </div>


       @livewireScripts
       <script>
           function toggleSidebar() {
               const sidebar = document.getElementById('sidebar');
               sidebar.classList.toggle('-translate-x-full');
           }

           // Close button
           document.getElementById('closeBtn').addEventListener('click', function() {
               const sidebar = document.getElementById('sidebar');
               sidebar.classList.add('-translate-x-full');
           });


           document.addEventListener('click', function(event) {
               const sidebar = document.getElementById('sidebar');
               const toggleBtn = document.querySelector('[onclick="toggleSidebar()"]');

               if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                   sidebar.classList.add('-translate-x-full');
               }
           });
       </script>
       <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
       </script>
       @stack('script')
   </body>

   </html>
