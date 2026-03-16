<x-layout.app navTheme="light">
    <x-slot:title>Dashboard Mentor - Ruang Dampak</x-slot:title>

    <div class="bg-neutral-50 min-h-screen pb-24 pt-24 md:pt-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- 1. Greeting --}}
            <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <p class="text-sm font-body text-neutral-500 mb-1">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                    <h1 class="text-3xl font-display font-black text-primary-950 tracking-tight">Halo, {{ $mentor_name }}! 👋</h1>
                </div>
                <x-ui.button variant="outline" size="sm" class="bg-white">
                    <i class="fa-solid fa-gear mr-2"></i> Pengaturan Mentor
                </x-ui.button>
            </div>

            {{-- 2. Stats Row --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
                <x-ui.card class="bg-white border-neutral-200 p-5">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 rounded-lg bg-primary-50 text-primary-600 flex items-center justify-center"><i class="fa-solid fa-users-rectangle text-sm"></i></div>
                        <p class="text-neutral-500 font-display font-semibold text-xs uppercase tracking-wider">Batch Aktif</p>
                    </div>
                    <p class="text-3xl font-display font-black text-primary-950">{{ $stats['batch_aktif'] }}</p>
                </x-ui.card>
                
                <x-ui.card class="bg-white border-neutral-200 p-5">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center"><i class="fa-solid fa-users text-sm"></i></div>
                        <p class="text-neutral-500 font-display font-semibold text-xs uppercase tracking-wider">Total Peserta</p>
                    </div>
                    <p class="text-3xl font-display font-black text-primary-950">{{ $stats['total_peserta'] }}</p>
                </x-ui.card>

                <x-ui.card class="bg-white border-rose-200 border-2 p-5 relative overflow-hidden">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-rose-100 rounded-full blur-2xl -translate-y-1/2 translate-x-1/3"></div>
                    <div class="flex items-center gap-3 mb-2 relative z-10">
                        <div class="w-8 h-8 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center"><i class="fa-solid fa-file-signature text-sm"></i></div>
                        <p class="text-rose-600 font-display font-semibold text-xs uppercase tracking-wider">Pending Review</p>
                    </div>
                    <p class="text-3xl font-display font-black text-rose-600 relative z-10">{{ $stats['pending_review'] }} <span class="text-sm font-body text-rose-400 font-medium">Tugas</span></p>
                </x-ui.card>

                <x-ui.card class="bg-white border-neutral-200 p-5">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center"><i class="fa-solid fa-star text-sm"></i></div>
                        <p class="text-neutral-500 font-display font-semibold text-xs uppercase tracking-wider">Rating Mentor</p>
                    </div>
                    <p class="text-3xl font-display font-black text-primary-950">{{ $stats['rating'] }} <span class="text-sm font-body text-neutral-400 font-medium">/ 5.0</span></p>
                </x-ui.card>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Kolom Kiri: Live Session Terdekat (Lebar 2/3) --}}
                <div class="lg:col-span-2 space-y-8">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-display font-bold text-primary-950">Sesi Live Terdekat</h2>
                            <a href="#" class="text-sm font-display font-bold text-primary-600 hover:text-primary-800">Kelola Jadwal &rarr;</a>
                        </div>
                        
                        <div class="bg-primary-950 rounded-3xl p-6 md:p-8 border border-primary-900 shadow-xl shadow-primary-900/10">
                            <div class="flex flex-col md:flex-row justify-between gap-6">
                                <div>
                                    <x-ui.badge variant="subtle" type="info" class="mb-3 bg-primary-900 border-primary-800 text-primary-200">
                                        <i class="fa-regular fa-calendar mr-1"></i> {{ \Carbon\Carbon::parse($nextSession['scheduled_at'])->translatedFormat('d F Y') }}
                                    </x-ui.badge>
                                    <h3 class="text-2xl font-display font-black text-white mb-1">{{ $nextSession['title'] }}</h3>
                                    <p class="text-primary-200 font-body text-sm mb-4">{{ $nextSession['program'] }} • {{ $nextSession['batch'] }}</p>
                                    
                                    <div class="flex items-center gap-4 text-sm font-display font-bold text-primary-100">
                                        <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($nextSession['scheduled_at'])->format('H:i') }} WIB</span>
                                        <span class="flex items-center gap-1.5"><i class="fa-solid fa-hourglass-half"></i> {{ $nextSession['duration_min'] }} mnt</span>
                                    </div>
                                </div>
                                
                                <div class="shrink-0 flex flex-col justify-center">
                                    @if($nextSession['meeting_url'])
                                        <div class="bg-emerald-500/20 border border-emerald-500/50 text-emerald-300 font-display font-bold px-4 py-2 rounded-lg text-sm mb-3 flex items-center gap-2">
                                            <i class="fa-solid fa-check-circle"></i> Link Zoom Siap
                                        </div>
                                        <a href="{{ $nextSession['meeting_url'] }}" target="_blank" class="block text-center w-full bg-accent-teal hover:bg-emerald-400 text-primary-950 font-display font-bold px-6 py-3 rounded-xl transition-all shadow-lg hover:-translate-y-0.5">
                                            Mulai Sesi
                                        </a>
                                    @else
                                        <div class="bg-rose-500/20 border border-rose-500/50 text-rose-300 font-display font-bold px-4 py-2 rounded-lg text-sm mb-3 flex items-center gap-2">
                                            <i class="fa-solid fa-triangle-exclamation"></i> Link Belum Diset
                                        </div>
                                        <button class="w-full bg-white text-primary-950 font-display font-bold px-6 py-3 rounded-xl hover:bg-primary-50 transition-colors border border-transparent">
                                            Set Link Zoom &rarr;
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Daftar Batch --}}
                    <div>
                        <h2 class="text-xl font-display font-bold text-primary-950 mb-4">Batch yang Saya Bimbing</h2>
                        <div class="space-y-4">
                            @foreach($batches as $batch)
                            <x-ui.card class="p-6 bg-white border-neutral-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div>
                                    <h3 class="font-display font-bold text-primary-950 text-lg mb-1">{{ $batch['name'] }}</h3>
                                    <p class="text-sm font-body text-neutral-500">{{ $batch['program'] }}</p>
                                </div>
                                <div class="w-full sm:w-1/3 min-w-[200px]">
                                    <x-ui.progres-bar label="{{ $batch['peserta'] }} / {{ $batch['quota'] }} Peserta" :value="($batch['peserta'] / $batch['quota']) * 100" color="primary" />
                                </div>
                            </x-ui.card>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Submission Menunggu Review (Lebar 1/3) --}}
                <div class="space-y-8">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-display font-bold text-primary-950">Menunggu Review</h2>
                        </div>
                        
                        <div class="space-y-4">
                            @php $hasPending = false; @endphp
                            @foreach($pendingReviews as $task)
                                @if($task['status'] === 'submitted' || $task['status'] === 'pending')
                                    @php $hasPending = true; @endphp
                                    <x-ui.card class="p-5 bg-white border-neutral-200 hover:border-primary-300 transition-colors group">
                                        <div class="flex justify-between items-start mb-3">
                                            <div class="flex items-center gap-2">
                                                <div class="w-6 h-6 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center text-[10px] font-bold">AF</div>
                                                <span class="text-xs font-display font-bold text-neutral-600">Ahmad Fauzi</span>
                                            </div>
                                            <span class="text-[10px] font-body text-neutral-400">2 jam yang lalu</span>
                                        </div>
                                        <h3 class="font-display font-bold text-primary-950 text-sm mb-4 leading-snug group-hover:text-primary-600 transition-colors">{{ $task['title'] }}</h3>
                                        <x-ui.button variant="outline" size="sm" class="w-full justify-center text-xs">Review Tugas &rarr;</x-ui.button>
                                    </x-ui.card>
                                @endif
                            @endforeach

                            @if(!$hasPending)
                                <div class="text-center p-8 bg-neutral-50 border border-neutral-200 border-dashed rounded-2xl">
                                    <p class="text-neutral-500 font-body text-sm">Belum ada tugas yang perlu direview.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout.app>