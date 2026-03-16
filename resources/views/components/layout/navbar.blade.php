@php
    // Gunakan array untuk menghemat baris kode dan memudahkan manajemen menu
    $menus = [
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
    {{-- Sedikit efek glass di atas agar teks tetap terbaca di hero gelap, menebal saat di-scroll --}}
    :class="scrolled ? 'bg-white/95 backdrop-blur-xl border-neutral-200 shadow-sm' : 'bg-white/30 backdrop-blur-sm border-transparent'"
    class="fixed top-0 inset-x-0 z-50 border-b transition-all duration-300"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 justify-between items-center">
            
            {{-- Logo --}}
            <div class="flex-shrink-0 flex items-center left-9">
                <a href="/" class="flex items-center" wire:navigate.hover>
                    <img src="{{ asset('images/logo/rdampak.webp') }}" alt="Logo Ruang Dampak" class="h-10 md:h-11 w-auto">
                </a>
            </div>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex md:items-center md:space-x-8">
                @foreach($menus as $menu)
                    <a href="{{ route($menu['route']) }}" 
                       wire:navigate.hover 
                       class="text-sm font-display transition-colors 
                              {{ request()->routeIs($menu['route']) ? 'text-primary-600 font-bold' : 'text-neutral-800 font-medium hover:text-primary-600' }}">
                        {{ $menu['name'] }}
                    </a>
                @endforeach
            </div>

            {{-- Right Section: Icon & Auth --}}
            <div class="hidden md:flex items-center space-x-6">
                @guest
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}" wire:navigate>
                            <span class="text-sm font-display font-semibold text-neutral-800 hover:text-primary-600 transition-colors px-2">Masuk</span>
                        </a>
                        <x-ui.button variant="primary" size="sm" wire:navigate href="{{ route('register') }}">
                            Daftar
                        </x-ui.button>
                    </div>
                @endguest

                {{-- User Menu Desktop --}}
                @auth
                    <div class="relative">
                        <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false" type="button" class="flex text-sm rounded-full focus:outline-none ring-2 ring-transparent focus:ring-primary-100 transition-all hover:scale-105 active:scale-95">
                            <span class="sr-only">Open user menu</span>
                            <x-ui.avatar name="{{ auth()->user()->name }}" src="{{ auth()->user()->avatar_url }}" size="sm" class="border border-neutral-200 shadow-sm" />
                        </button>

                        <div x-show="userMenuOpen" 
                             x-transition:enter="transition ease-out duration-200" 
                             x-transition:enter-start="transform opacity-0 scale-95 translate-y-2" 
                             x-transition:enter-end="transform opacity-100 scale-100 translate-y-0" 
                             x-transition:leave="transition ease-in duration-75" 
                             x-transition:leave-start="transform opacity-100 scale-100 translate-y-0" 
                             x-transition:leave-end="transform opacity-0 scale-95 translate-y-2" 
                             class="absolute right-0 z-10 mt-3 w-60 origin-top-right rounded-2xl bg-white/95 backdrop-blur-xl py-2 shadow-xl border border-neutral-100 overflow-hidden" 
                             style="display: none;">
                             
                            <div class="px-5 py-3 border-b border-neutral-100 mb-1 bg-neutral-50/50">
                                <p class="text-sm font-display font-bold text-primary-950 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-[11px] font-body text-neutral-500 truncate mt-0.5">{{ auth()->user()->email }}</p>
                            </div>
                            
                            <div class="px-2 py-1">
                                <a href="{{ $dashboardRoute }}" wire:navigate class="flex items-center gap-2 px-3 py-2 text-sm text-neutral-600 hover:bg-neutral-50 hover:text-primary-600 rounded-xl transition-colors font-body">
                                    <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                                    Dashboard
                                </a>
                                <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm text-neutral-600 hover:bg-neutral-50 hover:text-primary-600 rounded-xl transition-colors font-body">
                                    <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    Profil
                                </a>
                            </div>

                            <div class="h-px bg-neutral-100 my-1"></div>
                            
                            <div class="px-2 pt-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 w-full text-left px-3 py-2 text-sm text-rose-600 hover:bg-rose-50 rounded-xl transition-colors font-body">
                                        <svg class="w-4 h-4 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            {{-- Mobile Menu Hamburger --}}
            <div class="flex items-center md:hidden gap-3">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center rounded-xl p-2.5 text-neutral-800 hover:bg-neutral-100 focus:outline-none transition-colors">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!mobileMenuOpen" class="block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg x-show="mobileMenuOpen" class="block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Dropdown --}}
    <div x-show="mobileMenuOpen" x-collapse class="md:hidden border-t border-neutral-100 bg-white/95 backdrop-blur-xl shadow-xl absolute w-full" style="display: none;">
        <div class="space-y-1 px-4 py-4">
            @foreach($menus as $menu)
                <a href="{{ route($menu['route']) }}" wire:navigate 
                   class="block rounded-xl px-4 py-3 text-base font-display transition-colors 
                          {{ request()->routeIs($menu['route']) ? 'bg-primary-50 text-primary-600 font-bold' : 'text-neutral-600 font-medium hover:bg-neutral-50 hover:text-neutral-900' }}">
                    {{ $menu['name'] }}
                </a>
            @endforeach
        </div>
        
        <div class="border-t border-neutral-100 pb-6 pt-4">
            @auth
                <div class="flex items-center px-6 mb-5">
                    <div class="flex-shrink-0">
                        <x-ui.avatar name="{{ auth()->user()->name }}" src="{{ auth()->user()->avatar_url }}" size="md" />
                    </div>
                    <div class="ml-4">
                        <div class="text-base font-display font-bold text-neutral-900">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-body text-neutral-500">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="space-y-2 px-4">
                    <a href="{{ $dashboardRoute }}" class="block rounded-xl px-4 py-3 text-base font-medium text-neutral-600 hover:bg-neutral-50 hover:text-primary-600 transition-colors">Dashboard</a>
                    <a href="#" class="block rounded-xl px-4 py-3 text-base font-medium text-neutral-600 hover:bg-neutral-50 hover:text-primary-600 transition-colors">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left rounded-xl px-4 py-3 text-base font-medium text-rose-600 hover:bg-rose-50 transition-colors">Keluar</button>
                    </form>
                </div>
            @else
                <div class="flex flex-col gap-3 px-6 pt-2">
                    <x-ui.button variant="outline" size="md" wire:navigate href="{{ route('login') }}" class="w-full">
                        Masuk
                    </x-ui.button>
                    <x-ui.button variant="primary" size="md" wire:navigate href="{{ route('register') }}" class="w-full">
                        Daftar Sekarang
                    </x-ui.button>
                </div>
            @endauth
        </div>
    </div>
</nav>