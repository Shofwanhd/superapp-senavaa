<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        @include('vendor.laravelpwa.meta') {{-- Tambahkan meta PWA di sini --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @stack('head')
    </head>
    <body class="antialiased bg-gray-50 text-gray-900">
        {{ $slot }}

        @livewireScripts
        @stack('scripts')
    </body>
</html>
