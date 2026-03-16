<x-layout.app navTheme="light">
    <x-slot:title>Belajar - {{ $program_name }}</x-slot:title>

    <div class="bg-neutral-50 min-h-screen pb-24 pt-20 md:pt-24" x-data="{ tab: 'modul' }">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col lg:flex-row gap-8 items-start">
                
                {{-- Kiri: Sidebar Navigasi Kelas (Sticky) --}}
                <div class="w-full lg:w-80 shrink-0 lg:sticky lg:top-28 space-y-6">
                    
                    {{-- Info Program --}}
                    <div class="bg-white rounded-2xl p-5 border border-neutral-200 shadow-sm">
                        <p class="text-xs font-display font-bold text-neutral-400 uppercase tracking-widest mb-1">{{ $batch_name }}</p>
                        <h1 class="text-lg font-display font-black text-primary-950 mb-4 leading-tight">{{ $program_name }}</h1>
                        <x-ui.progres-bar label="3 dari 8 modul selesai" :value="$progress" color="primary" />
                    </div>

                    {{-- Tabs Navigation --}}
                    <div class="flex bg-neutral-200/50 p-1 rounded-xl">
                        <button @click="tab = 'modul'" :class="tab === 'modul' ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700'" class="flex-1 py-2 text-xs font-display font-bold rounded-lg transition-all">Modul</button>
                        <button @click="tab = 'jadwal'" :class="tab === 'jadwal' ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700'" class="flex-1 py-2 text-xs font-display font-bold rounded-lg transition-all">Sesi Live</button>
                        <button @click="tab = 'tugas'" :class="tab === 'tugas' ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700'" class="flex-1 py-2 text-xs font-display font-bold rounded-lg transition-all">Tugas</button>
                    </div>

                    {{-- Konten Tab Modul --}}
                    <div x-show="tab === 'modul'" class="bg-white rounded-2xl border border-neutral-200 shadow-sm overflow-hidden">
                        {{-- Simulasi Grouping per Minggu --}}
                        @for($w = 1; $w <= 4; $w++)
                            <div class="bg-neutral-50 px-4 py-2 border-b border-neutral-200">
                                <span class="text-xs font-display font-bold text-neutral-500 uppercase tracking-wider">Minggu {{ $w }}</span>
                            </div>
                            <div class="divide-y divide-neutral-100">
                                @foreach($modules as $mod)
                                    @if($mod['week_number'] == $w)
                                        <button class="w-full text-left px-4 py-3 flex items-start gap-3 transition-colors {{ $mod['id'] == $active_module['id'] ? 'bg-primary-50' : 'hover:bg-neutral-50' }}">
                                            <div class="mt-0.5 shrink-0">
                                                @if($mod['done'])
                                                    <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                                @elseif($mod['id'] == $active_module['id'])
                                                    <i class="fa-regular fa-circle-dot text-primary-600"></i>
                                                @else
                                                    <i class="fa-regular fa-circle text-neutral-300"></i>
                                                @endif
                                            </div>
                                            <span class="text-sm font-body {{ $mod['id'] == $active_module['id'] ? 'text-primary-900 font-bold' : 'text-neutral-600' }}">{{ $mod['title'] }}</span>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        @endfor
                    </div>

                    {{-- Konten Tab Jadwal (Placeholder) --}}
                    <div x-show="tab === 'jadwal'" style="display:none;" class="bg-white rounded-2xl p-5 border border-neutral-200 shadow-sm text-center">
                        <i class="fa-regular fa-calendar text-3xl text-neutral-300 mb-2"></i>
                        <p class="text-sm font-body text-neutral-500">Jadwal sesi akan muncul di sini.</p>
                    </div>

                    {{-- Konten Tab Tugas (Placeholder) --}}
                    <div x-show="tab === 'tugas'" style="display:none;" class="bg-white rounded-2xl p-5 border border-neutral-200 shadow-sm text-center">
                        <i class="fa-solid fa-list-check text-3xl text-neutral-300 mb-2"></i>
                        <p class="text-sm font-body text-neutral-500">Daftar tugas akan muncul di sini.</p>
                    </div>
                </div>

                {{-- Kanan: Area Belajar Utama --}}
                <div class="flex-1 max-w-4xl bg-white rounded-[2rem] border border-neutral-200 shadow-sm overflow-hidden">
                    
                    {{-- Header Area Belajar --}}
                    <div class="p-8 md:p-12 border-b border-neutral-100">
                        <x-ui.badge variant="subtle" type="primary" class="mb-4">Minggu {{ $active_module['week_number'] }} • Modul {{ $active_module['id'] }}</x-ui.badge>
                        <h1 class="text-3xl font-display font-black text-primary-950 tracking-tight">{{ $active_module['title'] }}</h1>
                    </div>

                    {{-- Video Player Area --}}
                    <div class="aspect-video bg-neutral-900 relative flex items-center justify-center group cursor-pointer">
                        <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff1a_1px,transparent_1px),linear-gradient(to_bottom,#ffffff1a_1px,transparent_1px)] bg-[size:32px_32px]"></div>
                        <div class="w-20 h-20 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white border border-white/20 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-play text-2xl ml-1"></i>
                        </div>
                        <p class="absolute bottom-4 right-4 text-xs font-body text-white/50">[Video Player Placeholder]</p>
                    </div>

                    {{-- Text Content --}}
                    <div class="p-8 md:p-12">
                        <div class="prose prose-primary max-w-none font-body text-neutral-600 leading-relaxed mb-12">
                            <p>User Persona adalah representasi semi-fiktif dari target pelanggan ideal Anda berdasarkan riset pengguna dan data yang sebenarnya. Persona membantu tim desain, pemasaran, dan produk untuk memahami audiens mereka dengan lebih baik.</p>
                            <p>Dalam membuat persona yang efektif, pastikan Anda mencakup elemen-elemen berikut: demografi dasar, motivasi, *pain points* (titik masalah), dan *goals* (tujuan akhir).</p>
                            <p><em>(Ini adalah teks dummy materi pembelajaran. Di tahap produksi, ini akan diisi dari database menggunakan WYSIWYG editor.)</em></p>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col gap-4">
                            <x-ui.button variant="primary" class="w-full justify-center py-4 text-base">
                                <i class="fa-solid fa-check mr-2"></i> Tandai Modul Selesai
                            </x-ui.button>
                            
                            <div class="flex items-center justify-between border-t border-neutral-100 pt-6 mt-2">
                                <button class="text-sm font-display font-bold text-neutral-400 hover:text-primary-600 transition-colors">
                                    &larr; Modul Sebelumnya
                                </button>
                                <button class="text-sm font-display font-bold text-primary-600 hover:text-primary-800 transition-colors">
                                    Modul Berikutnya &rarr;
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout.app>