<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 py-8 mt-20" x-data="{ tab: 'kurikulum' }">
        
        {{-- Breadcrumb (Dibuat lebih kecil) --}}
        <nav class="flex text-slate-400 text-xs font-medium mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('program.index') }}" class="hover:text-primary-600 transition-colors">Program</a></li>
                <li class="text-slate-300">/</li>
                <li class="text-slate-900 font-bold">{{ $program->title }}</li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row gap-10">
            
            {{-- KOLOM KIRI --}}
            <div class="lg:w-3/5">
                {{-- 1. THUMBNAIL SECTION --}}
                <div class="relative aspect-video rounded-2xl overflow-hidden mb-8 shadow-sm border border-slate-100 group">
                    <img src="{{ $program->thumbnail_url }}" class="w-full h-full object-cover">
                    <div class="absolute bottom-4 left-4">
                         <span class="px-3 py-1.5 bg-white/90 backdrop-blur-md text-primary-700 rounded-lg text-[10px] font-black uppercase tracking-widest shadow-lg">
                            {{ $program->type }}
                        </span>
                    </div>
                </div>

                {{-- 2. HEADER INFO (Ukuran Heading Diturunkan) --}}
                <div class="mb-10">
                    <h1 class="font-display font-black text-2xl md:text-3xl text-slate-900 mb-4 leading-tight tracking-tight">
                        {{ $program->title }}
                    </h1>
                    {{-- Prose Default (Lebih kecil dari prose-lg) --}}
                    <div class="prose prose-slate prose-sm md:prose-base max-w-none text-slate-600 font-body leading-relaxed">
                        {!! $program->description !!}
                    </div>
                </div>

                {{-- 3. INTERACTIVE TABS (Ukuran Font Standar) --}}
                <div class="border-b border-slate-200 mb-6 flex gap-6 md:gap-10 overflow-x-auto hide-scrollbar">
                    @foreach(['Kurikulum', 'Live Session', 'Mentor', 'FAQ'] as $t)
                        @php $tabId = strtolower(str_replace(' ', '-', $t)); @endphp
                        <button @click="tab = '{{ $tabId }}'"
                                :class="tab === '{{ $tabId }}' ? 'border-primary-600 text-primary-600' : 'border-transparent text-slate-400 hover:text-slate-600'"
                                class="pb-3 border-b-4 font-display font-bold text-sm md:text-base transition-all whitespace-nowrap">
                            {{ $t }}
                        </button>
                    @endforeach
                </div>

                {{-- 4. TAB CONTENT --}}
                <div class="min-h-[300px]">
                    {{-- Kurikulum --}}
                    <div x-show="tab === 'kurikulum'" x-transition class="space-y-4">
                        @foreach($program->modules->groupBy('week_number') as $week => $modules)
                            <div x-data="{ open: {{ $week == 1 ? 'true' : 'false' }} }" class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                                <button @click="open = !open" class="w-full flex items-center justify-between p-4 md:p-5 text-left hover:bg-slate-50">
                                    <div class="flex items-center gap-3">
                                        <span class="w-8 h-8 rounded-lg bg-primary-50 text-primary-600 flex items-center justify-center font-bold text-xs">W{{ $week }}</span>
                                        <span class="font-display font-bold text-slate-800 text-base">Minggu {{ $week }}: Materi Utama</span>
                                    </div>
                                    <svg :class="open ? 'rotate-180' : ''" class="w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="open" x-collapse>
                                    <div class="px-5 pb-5 space-y-2">
                                        @foreach($modules as $module)
                                            <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg hover:bg-primary-50 transition-colors cursor-pointer group/item">
                                                <div class="flex items-center gap-3">
                                                    <i class="fa-solid {{ $module->video_url ? 'fa-circle-play text-primary-600' : 'fa-file-lines text-slate-400' }} text-sm"></i>
                                                    <span class="text-sm font-bold text-slate-700 group-hover/item:text-primary-900">{{ $module->title }}</span>
                                                </div>
                                                <span class="text-[10px] font-bold text-slate-400">Tersedia</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Live Session --}}
                    <div x-show="tab === 'live-session'" x-transition class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="p-2 bg-primary-100 rounded-xl text-primary-600"><i class="fa-solid fa-video text-base"></i></span>
                            <h3 class="font-display font-bold text-lg text-slate-900">Jadwal Pertemuan Langsung</h3>
                        </div>
                        <div class="space-y-6 relative before:absolute before:inset-y-0 before:left-4 before:w-0.5 before:bg-slate-100">
                            @foreach(range(1,4) as $week)
                                <div class="relative pl-10">
                                    <div class="absolute left-2.5 top-1 w-3 h-3 rounded-full bg-primary-600 border-2 border-white"></div>
                                    <p class="text-[10px] font-black text-primary-600 mb-1 uppercase tracking-widest">Minggu {{ $week }}</p>
                                    <h4 class="font-bold text-slate-900 text-base">Workshop & Mentoring Sesi #{{ $week }}</h4>
                                    <p class="text-xs text-slate-500 font-medium flex items-center gap-2 mt-1">
                                        <i class="fa-regular fa-clock"></i> Jum’at, 19:00 WIB (Zoom)
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Mentor --}}
                    <div x-show="tab === 'mentor'" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach([['Momon van Strong', 'Expert UI/UX'], ['Rizki The Great', 'Senior Cyber Security']] as $m)
                        <div class="bg-white border border-slate-200 rounded-2xl p-5 flex items-center gap-4">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($m[0]) }}&background=random" class="w-14 h-14 rounded-xl object-cover border border-slate-100">
                            <div>
                                <h4 class="font-bold text-slate-900 text-base leading-tight">{{ $m[0] }}</h4>
                                <p class="text-xs text-slate-500 mb-2">{{ $m[1] }}</p>
                                <div class="flex gap-3 text-slate-400">
                                    <a href="#" class="hover:text-primary-600 transition-colors"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="#" class="hover:text-slate-900 transition-colors"><i class="fa-brands fa-github"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- FAQ (Lebih Kompak) --}}
                    <div x-show="tab === 'faq'" x-transition class="space-y-3">
                        @foreach(['Cara pendaftaran?', 'Sertifikat?', 'Bisa dicicil?'] as $q)
                            <div x-data="{ open: false }" class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                                <button @click="open = !open" class="w-full flex items-center justify-between p-4 text-left hover:bg-slate-50 transition">
                                    <span class="font-bold text-slate-800 text-sm md:text-base">{{ $q }}</span>
                                    <i :class="open ? 'fa-solid fa-minus' : 'fa-solid fa-plus'" class="text-primary-600 text-xs"></i>
                                </button>
                                <div x-show="open" x-collapse class="px-4 pb-4 text-xs md:text-sm text-slate-600 leading-relaxed">
                                    Kurikulum kami disusun bersama mitra perusahaan untuk memastikan relevansi skill.
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN (Sidebar Disesuaikan) --}}
            <div class="lg:w-2/5">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 p-6 md:p-7">
                        {{-- Harga --}}
                        <div class="mb-6">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Investasi Belajar</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-2xl font-black text-slate-900">{{ $program->price }}</span>
                                <span class="text-sm text-slate-300 line-through">Rp 499rb</span>
                            </div>
                        </div>

                        {{-- Progress Slot (Lebih Pipih) --}}
                        <div class="space-y-3 mb-8">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-bold text-slate-500">Sisa Kapasitas</span>
                                <span class="text-xs font-black text-primary-600">12 / 20 Slot</span>
                            </div>
                            <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-primary-600 rounded-full transition-all duration-1000" style="width: 60%"></div>
                            </div>
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-tight">Batch segera ditutup</p>
                        </div>

                        {{-- Tombol Utama --}}
                        <button class="w-full bg-primary-600 text-white font-display font-black py-4 rounded-xl hover:bg-primary-700 transition shadow-md text-base mb-6">
                            Daftar Sekarang
                        </button>

                        {{-- Benefit List (Lebih Kecil) --}}
                        <div class="space-y-3 pt-5 border-t border-slate-100">
                            @foreach(['Rekaman Selamanya', 'Sertifikat Kompetensi', 'Portfolio Review'] as $benefit)
                                <div class="flex items-center gap-3 text-slate-600">
                                    <div class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                                        <i class="fa-solid fa-check text-[9px]"></i>
                                    </div>
                                    <span class="text-xs font-bold">{{ $benefit }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>