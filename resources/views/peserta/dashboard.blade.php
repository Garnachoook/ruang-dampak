<x-layout.app navTheme="light">
    <x-slot:title>Dashboard Peserta - Ruang Dampak</x-slot:title>

    <div class="bg-neutral-50 min-h-screen pb-24 pt-24 md:pt-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- 1. Greeting --}}
            <div class="mb-8">
                <p class="text-sm font-body text-neutral-500 mb-1">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                <h1 class="text-3xl font-display font-black text-primary-950 tracking-tight">Selamat datang, {{ auth()->user()->name ?? 'Budi' }}! 👋</h1>
            </div>

            {{-- 2. Stats Row --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                <x-ui.card class="bg-primary-950 border-none p-5 text-white relative overflow-hidden">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-rose-500/20 rounded-full blur-xl -translate-y-1/2 translate-x-1/3"></div>
                    <p class="text-primary-300 font-display font-semibold text-xs uppercase tracking-wider mb-2">Streak Belajar</p>
                    <p class="text-3xl font-display font-black">{{ $streak }} Hari 🔥</p>
                </x-ui.card>
                <x-ui.card class="bg-white border-neutral-200 p-5">
                    <p class="text-neutral-500 font-display font-semibold text-xs uppercase tracking-wider mb-2">Program Aktif</p>
                    <p class="text-3xl font-display font-black text-primary-950">2</p>
                </x-ui.card>
                <x-ui.card class="bg-white border-neutral-200 p-5">
                    <p class="text-neutral-500 font-display font-semibold text-xs uppercase tracking-wider mb-2">Tugas Pending</p>
                    <p class="text-3xl font-display font-black text-amber-500">1</p>
                </x-ui.card>
                <x-ui.card class="bg-white border-neutral-200 p-5">
                    <p class="text-neutral-500 font-display font-semibold text-xs uppercase tracking-wider mb-2">Sertifikat</p>
                    <p class="text-3xl font-display font-black text-primary-950">0</p>
                </x-ui.card>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Kolom Kiri: Live Session & Program --}}
                <div class="lg:col-span-2 space-y-8">
                    
                    {{-- 3. Live Session Terdekat --}}
                    @php $nextSession = $upcomingSessions[0]; @endphp
                    <div>
                        <h2 class="text-xl font-display font-bold text-primary-950 mb-4">Sesi Mentoring Berikutnya</h2>
                        <div class="bg-primary-950 rounded-3xl p-6 md:p-8 border border-primary-900 relative overflow-hidden shadow-xl shadow-primary-900/10">
                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(14,165,233,0.2),transparent_60%)]"></div>
                            
                            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                                <div>
                                    <x-ui.badge variant="solid" type="info" class="mb-3">
                                        <i class="fa-regular fa-calendar-check mr-1"></i> HARI INI
                                    </x-ui.badge>
                                    <h3 class="text-2xl font-display font-black text-white mb-1">{{ $nextSession['title'] }}</h3>
                                    <p class="text-primary-200 font-body text-sm mb-4">{{ $nextSession['program'] }} • {{ $nextSession['batch'] }}</p>
                                    <div class="flex items-center gap-4 text-sm font-display font-bold text-primary-100">
                                        <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock"></i> 19:00 WIB</span>
                                        <span class="flex items-center gap-1.5"><i class="fa-solid fa-hourglass-half"></i> {{ $nextSession['duration_min'] }} menit</span>
                                    </div>
                                </div>
                                
                                <div class="shrink-0 w-full md:w-auto">
                                    @if($nextSession['meeting_url'])
                                        <a href="{{ $nextSession['meeting_url'] }}" target="_blank" class="block text-center w-full bg-accent-teal hover:bg-emerald-400 text-primary-950 font-display font-bold px-6 py-3.5 rounded-xl transition-all shadow-lg shadow-accent-teal/20 hover:-translate-y-1">
                                            Gabung Zoom &rarr;
                                        </a>
                                    @else
                                        <button disabled class="w-full bg-primary-800 text-primary-400 font-display font-bold px-6 py-3.5 rounded-xl cursor-not-allowed">
                                            Link belum tersedia
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 4. Program Saya --}}
                    <div>
                        <h2 class="text-xl font-display font-bold text-primary-950 mb-4">Program Berjalan</h2>
                        <div class="space-y-4">
                            @foreach(array_slice($programs, 0, 2) as $prog)
                            <x-ui.card class="p-4 bg-white hover:border-primary-300 transition-colors flex items-center gap-4">
                                <div class="w-16 h-16 rounded-xl bg-neutral-100 flex items-center justify-center shrink-0">
                                    <span class="text-neutral-400 font-display font-bold text-xs">IMG</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-display font-bold text-primary-950 mb-1 truncate">{{ $prog['title'] }}</h3>
                                    <x-ui.progres-bar label="Progress" value="50" color="primary" />
                                </div>
                                <a href="{{ route('peserta.belajar.show') }}" class="hidden sm:flex shrink-0 w-10 h-10 rounded-full bg-primary-50 text-primary-600 items-center justify-center hover:bg-primary-100 transition-colors">
                                    <i class="fa-solid fa-play ml-1"></i>
                                </a>
                            </x-ui.card>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Tugas Pending --}}
                <div class="space-y-8">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-display font-bold text-primary-950">Tugas Pending</h2>
                            <a href="#" class="text-sm font-display font-bold text-primary-600 hover:text-primary-800">Lihat Semua</a>
                        </div>
                        <div class="space-y-4">
                            @foreach($assignments as $task)
                                @if($task['status'] === 'pending')
                                <x-ui.card class="p-5 bg-white border-l-4 border-l-rose-500">
                                    <x-ui.badge variant="subtle" type="error" class="mb-2 text-[10px]">Tenggat: Besok, 23:59</x-ui.badge>
                                    <h3 class="font-display font-bold text-primary-950 mb-1">{{ $task['title'] }}</h3>
                                    <p class="text-xs font-body text-neutral-500 mb-4">{{ $task['program'] }}</p>
                                    <x-ui.button variant="outline" size="sm" class="w-full justify-center">Kerjakan Tugas &rarr;</x-ui.button>
                                </x-ui.card>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout.app>