<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ruang Dampak') }} - Dashboard Mentor</title>

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Livewire Styles -->
        @livewireStyles
    </head>
    <body class="font-body text-neutral-900 antialiased bg-neutral-50 flex min-h-screen">
        
        <!-- Sidebar -->
        <x-layout.sidebar-mentor />

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-h-screen overflow-hidden">
            <!-- Mobile Header -->
            <header class="lg:hidden h-16 bg-primary-950 border-b border-primary-900 flex items-center justify-between px-4">
                <a href="/" class="text-xl font-display font-bold text-white tracking-wide">
                    Ruang<span class="text-accent-teal">Dampak</span>
                </a>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                @if (isset($header))
                    <header class="mb-8">
                        {{ $header }}
                    </header>
                @endif
                
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
        @stack('scripts')
    </body>
</html>
