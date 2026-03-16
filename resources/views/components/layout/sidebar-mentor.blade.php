<aside class="w-64 flex-shrink-0 hidden lg:flex flex-col bg-primary-950 border-r border-primary-900 min-h-screen">
    <div class="h-16 flex items-center px-6 border-b border-primary-900">
        <a href="/" class="text-xl font-display font-bold text-white tracking-wide">
            Ruang<span class="text-accent-teal">Dampak</span>
        </a>
    </div>

    <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
        @php
            $navItems = [
                ['label' => 'Dashboard', 'icon' => 'home', 'route' => '#'],
                ['label' => 'Batch Saya', 'icon' => 'users', 'route' => '#'],
                ['label' => 'Review Tugas', 'icon' => 'check-circle', 'route' => '#'],
                ['label' => 'Profil & Portofolio', 'icon' => 'user', 'route' => '#'],
            ];
            
            $activeRoute = 'Dashboard';
        @endphp

        @foreach($navItems as $item)
            @php
                $isActive = $activeRoute === $item['label'];
                $classes = $isActive 
                    ? 'bg-primary-800 text-white' 
                    : 'text-primary-300 hover:bg-primary-900/50 hover:text-white';
            @endphp
            <a href="{{ $item['route'] }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-body font-medium transition-colors {{ $classes }}">
                <div class="w-5 h-5 opacity-70">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>

    <div class="p-4 border-t border-primary-900">
        <div class="flex items-center gap-3 px-2 py-2">
            <x-ui.avatar name="{{ auth()->user()->name ?? 'Mentor' }}" size="sm" />
            <div class="flex-1 min-w-0">
                <p class="text-sm font-display font-medium text-white truncate">{{ auth()->user()->name ?? 'Guest Mentor' }}</p>
                <p class="text-xs text-primary-400 truncate">Mentor</p>
            </div>
        </div>
    </div>
</aside>
