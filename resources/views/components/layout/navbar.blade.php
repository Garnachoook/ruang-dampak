@php
    $menus = [
        ['name' => 'Beranda', 'route' => 'welcome'],
        ['name' => 'Tentang Kami', 'route' => 'tentang-kami.index'],
        ['name' => 'Program', 'route' => 'program.index'],
        ['name' => 'Learning Path', 'route' => 'learning-path.index'],
        ['name' => 'Komunitas', 'route' => 'komunitas.index'],
        ['name' => 'Career', 'route' => 'career.index'],
    ];

    $dashboardRoute = '/';
    if(auth()->check()) {
        $dashboardRoute = match(auth()->user()->role) {
            'peserta' => '/peserta/dashboard',
            'mentor' => '/mentor/dashboard',
            'mitra' => '/mitra/dashboard',
            default => '/',
        };
    }
@endphp

<nav 
    x-data="{ mobileMenuOpen: false, userMenuOpen: false, scrolled: false }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="scrolled ? 'bg-white border-neutral-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)]' : 'bg-transparent border-transparent'"
    class="fixed top-0 inset-x-0 z-50 border-b transition-all duration-300"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            
            {{-- Bagian Kiri: Logo --}}
            <div class="flex-shrink-0 flex items-center lg:w-48">
                <a href="/" class="flex items-center" wire:navigate.hover>
                    <img src="{{ asset('images/logo/rdampak.webp') }}" alt="Logo Ruang Dampak" class="h-10 md:h-11 w-auto">
                </a>
            </div>

            {{-- Bagian Tengah: Desktop Menu (Hanya muncul di Layar LG/Laptop ke atas) --}}
            <div class="hidden lg:flex flex-1 justify-center items-center gap-6 xl:gap-8">
                @foreach($menus as $menu)
                    <a href="{{ route($menu['route']) }}" 
                       wire:navigate.hover 
                       class="relative text-sm font-display transition-colors group py-2
                              {{ request()->routeIs($menu['route']) ? 'text-primary-900 font-bold' : 'text-neutral-600 font-medium hover:text-primary-900' }}">
                        {{ $menu['name'] }}
                        
                        @if(request()->routeIs($menu['route']))
                            <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-accent-500 rounded-full"></span>
                        @else
                            <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-0 h-1.5 bg-accent-500 rounded-full transition-all duration-300 group-hover:w-1.5 opacity-0 group-hover:opacity-100"></span>
                        @endif
                    </a>
                @endforeach
            </div>

            {{-- Bagian Kanan: Icon & Auth (Hanya muncul di Layar LG/Laptop ke atas) --}}
            <div class="hidden lg:flex items-center justify-end w-48 gap-4">
                @guest
                    <a href="{{ route('login') }}" wire:navigate class="text-sm font-display font-semibold text-neutral-600 hover:text-primary-900 transition-colors px-2 py-2">
                        Masuk
                    </a>
                    <x-ui.button variant="primary" size="sm" wire:navigate href="{{ route('register') }}" class="shadow-md shadow-primary-900/10">
                        Daftar
                    </x-ui.button>
                @endguest

                @auth
                    <div class="relative">
                        <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false" type="button" class="flex text-sm rounded-xl focus:outline-none ring-2 ring-transparent focus:ring-primary-100 transition-all hover:scale-105 active:scale-95">
                            <span class="sr-only">Open user menu</span>
                            <x-ui.avatar name="{{ auth()->user()->name }}" src="{{ auth()->user()->avatar_url }}" size="sm" class="border border-neutral-200 shadow-sm rounded-xl" />
                        </button>

                        <div x-show="userMenuOpen" 
                             x-transition:enter="transition ease-out duration-200" 
                             x-transition:enter-start="transform opacity-0 scale-95 translate-y-2" 
                             x-transition:enter-end="transform opacity-100 scale-100 translate-y-0" 
                             x-transition:leave="transition ease-in duration-75" 
                             x-transition:leave-start="transform opacity-100 scale-100 translate-y-0" 
                             x-transition:leave-end="transform opacity-0 scale-95 translate-y-2" 
                             class="absolute right-0 z-10 mt-3 w-60 origin-top-right rounded-xl bg-white py-2 shadow-xl border border-neutral-100 overflow-hidden" 
                             style="display: none;">
                             
                            <div class="px-5 py-3 border-b border-neutral-100 mb-1 bg-neutral-50/50">
                                <p class="text-sm font-display font-bold text-primary-900 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-[11px] font-body text-neutral-500 truncate mt-0.5">{{ auth()->user()->email }}</p>
                            </div>
                            
                            <div class="px-2 py-1 flex flex-col gap-1">
                                <a href="{{ $dashboardRoute }}" wire:navigate class="flex items-center gap-3 px-3 py-2 text-sm text-neutral-600 hover:bg-neutral-50 hover:text-primary-900 rounded-xl transition-colors font-body">
                                    <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                                    Dashboard
                                </a>
                                <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-neutral-600 hover:bg-neutral-50 hover:text-primary-900 rounded-xl transition-colors font-body">
                                    <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    Profil
                                </a>
                            </div>

                            <div class="h-px bg-neutral-100 my-1"></div>
                            
                            <div class="px-2 pt-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 w-full text-left px-3 py-2 text-sm text-rose-600 hover:bg-rose-50 rounded-xl transition-colors font-body">
                                        <svg class="w-4 h-4 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            {{-- Mobile Menu Hamburger (Tampil hingga batas layar LG) --}}
            <div class="flex items-center lg:hidden gap-3">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center rounded-xl p-2.5 text-neutral-800 hover:bg-neutral-100 focus:outline-none transition-colors">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!mobileMenuOpen" class="block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg x-show="mobileMenuOpen" class="block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Dropdown (Diubah ke lg:hidden agar aktif di tablet) --}}
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden border-t border-neutral-100 bg-white shadow-xl absolute w-full" 
         style="display: none;">
        <div class="space-y-1 px-4 py-4 flex flex-col gap-1">
            @foreach($menus as $menu)
                <a href="{{ route($menu['route']) }}" wire:navigate 
                   class="block rounded-xl px-4 py-3 text-sm font-display transition-colors 
                          {{ request()->routeIs($menu['route']) ? 'bg-primary-50 text-primary-900 font-bold' : 'text-neutral-600 font-medium hover:bg-neutral-50 hover:text-primary-900' }}">
                    {{ $menu['name'] }}
                </a>
            @endforeach
        </div>
        
        <div class="border-t border-neutral-100 pb-6 pt-4 bg-slate-50">
            @auth
                <div class="flex items-center px-6 mb-5">
                    <div class="flex-shrink-0">
                        <x-ui.avatar name="{{ auth()->user()->name }}" src="{{ auth()->user()->avatar_url }}" size="md" class="rounded-xl border border-neutral-200 shadow-sm" />
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-display font-bold text-primary-900">{{ auth()->user()->name }}</div>
                        <div class="text-xs font-body text-neutral-500 mt-0.5">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="space-y-1 px-4 flex flex-col gap-1">
                    <a href="{{ $dashboardRoute }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-neutral-600 hover:bg-neutral-100 hover:text-primary-900 transition-colors">Dashboard</a>
                    <a href="#" class="block rounded-xl px-4 py-3 text-sm font-medium text-neutral-600 hover:bg-neutral-100 hover:text-primary-900 transition-colors">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left rounded-xl px-4 py-3 text-sm font-medium text-rose-600 hover:bg-rose-50 transition-colors">Keluar</button>
                    </form>
                </div>
            @else
                <div class="flex flex-col gap-3 px-6 pt-2">
                    <x-ui.button variant="outline" size="md" wire:navigate href="{{ route('login') }}" class="w-full justify-center">
                        Masuk
                    </x-ui.button>
                    <x-ui.button variant="primary" size="md" wire:navigate href="{{ route('register') }}" class="w-full justify-center shadow-md shadow-primary-900/10">
                        Daftar Sekarang
                    </x-ui.button>
                </div>
            @endauth
        </div>
    </div>
</nav>