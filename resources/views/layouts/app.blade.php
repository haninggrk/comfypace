<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Comfypace</title>
        <script src="{{ mix('/js/app.js') }}" defer></script>
        <link rel="icon" href="{{ asset('favicon.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen" style="background:#F5F7F7"  
        {{-- style="background-image: url('{{asset('background.jpeg')}}') --}}
        >
            @livewire('navigation-menu')

            <!-- Page Heading -->
     

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewire('notifications')
        @stack('scripts')
        @livewireScripts
    </body>
</html>
