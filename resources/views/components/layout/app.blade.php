@props(['navTheme' => 'light']) {{-- Default adalah light --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" href="{{ asset('images/logo/logoa.webp') }}">

        <title>{{ config('app.name', 'Ruang Dampak') }}</title>

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Livewire Styles -->
        @livewireStyles
    </head>
    <body class="font-body text-neutral-900 antialiased bg-neutral-50 flex flex-col min-h-screen">
        
        <!-- Navbar components -->
        <x-layout.navbar />

        <!-- Main Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer components -->
        <x-layout.footer />

        <!-- Livewire Scripts -->
        @livewireScripts
        
        <!-- Additional Scripts -->
        @stack('scripts')
    </body>
</html>
