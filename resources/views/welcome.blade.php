<x-layout.app>

    {{-- 1. Hero Section --}}
    <section class="relative bg-slate-50 pt-32 pb-20 lg:pt-28 lg:pb-28 overflow-hidden">
        <x-ui.background-pattern />
        <div class="absolute top-0 right-0 -translate-y-12 translate-x-1/3 w-[800px] h-[800px] bg-primary-100/50 rounded-full blur-3xl opacity-70 pointer-events-none"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                {{-- KOLOM KIRI: Copywriting & CTA --}}
                <div class="text-left max-w-7xl relative z-10">
                    
                    {{-- H1 Update Baru --}}
                    <h1 class="font-display font-black text-4xl md:text-6xl text-primary-950 mb-6 tracking-tight leading-[1.1]">
                        Belajar Keterampilan Baru, <br class="hidden md:block" />
                        <span class="text-primary-600">Wujudkan Potensi Terbaikmu.</span>
                    </h1>
                    
                    <p class="text-lg md:text-xl text-neutral-500 font-body max-w-2xl mb-10 leading-relaxed">
                        Tingkatkan keahlianmu melalui kurikulum berbasis studi kasus dan bimbingan langsung dari mentor mahasiswa berprestasi yang siap membantumu.
                    </p>
            
                    {{-- Button Group --}}
                    <div class="flex flex-col sm:flex-row gap-4 mb-6">
                        <a href="{{ route('register') }}" class="inline-flex justify-center items-center bg-primary-900 text-white hover:bg-primary-800 px-8 py-4 rounded-xl font-display font-semibold transition-all shadow-lg shadow-primary-900/20 text-md">
                            Mulai Belajar Sekarang
                        </a>
                        <a href="{{ route('program.index') }}" class="inline-flex justify-center items-center bg-white text-primary-900 border border-primary-200 hover:border-primary-300 hover:bg-slate-50 px-8 py-4 rounded-xl font-display font-semibold transition-all text-md shadow-sm">
                            Eksplorasi Program
                        </a>
                    </div>

                    {{-- Fitur Tambahan: Career Quiz Link --}}
                    <div class="flex items-center gap-3 px-2">
                        <div class="w-8 h-8 rounded-full bg-accent-50 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <p class="font-body text-sm text-neutral-600">
                            Bingung mulai dari mana? 
                            <a href="#" class="font-display font-bold text-primary-800 hover:text-primary-600 hover:underline underline-offset-4 transition-all">
                                Ikuti Tes Career Quiz
                            </a>
                        </p>
                    </div>

                    <div class="mt-10 border-primary-900/10 grid grid-cols-3 gap-6">
                        <div>
                            <p class="text-2xl md:text-3xl font-display font-bold text-primary-900">1.2K+</p>
                            <p class="text-xs md:text-sm font-body text-neutral-500 mt-1">Siswa Aktif</p>
                        </div>
                        <div>
                            <p class="text-2xl md:text-3xl font-display font-bold text-primary-900">50+</p>
                            <p class="text-xs md:text-sm font-body text-neutral-500 mt-1">Mentor Mahasiswa</p>
                        </div>
                        <div>
                            <p class="text-2xl md:text-3xl font-display font-bold text-primary-900">4.9/5</p>
                            <p class="text-xs md:text-sm font-body text-neutral-500 mt-1">Rating Mentoring</p>
                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN: Career Journey Collage --}}
                {{-- KOLOM KANAN: Professional Edutech Interface Showcase --}}
                <div class="relative lg:h-[600px] mt-16 lg:mt-0 flex items-center justify-center">
                    
                    {{-- Decorative Background Glow --}}
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary-50 to-transparent rounded-full transform scale-95 opacity-80 pointer-events-none"></div>

                    {{-- Center Piece: Main Dashboard/Class Interface --}}
                    <div class="relative w-full max-w-sm md:max-w-md bg-white rounded-2xl shadow-[0_20px_60px_-15px_rgba(2,47,110,0.15)] overflow-hidden z-10 border border-neutral-100 flex flex-col transform md:rotate-1 hover:rotate-0 transition-all duration-500">
                        
                        {{-- Fake App Header --}}
                        <div class="bg-primary-900 px-5 py-4 flex items-center justify-between border-b border-primary-800">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <span class="font-display font-semibold text-white text-sm">Ruang Belajar</span>
                            </div>
                            <x-ui.badge class="bg-accent-500 text-neutral-500 border-none font-bold text-[10px] uppercase px-2 py-1 rounded-md">Live Class</x-ui.badge>
                        </div>

                        {{-- Fake Video/Presentation Area --}}
                        <div class="relative h-48 md:h-56 bg-slate-100 flex flex-col items-center justify-center p-6 border-b border-neutral-100">
                            {{-- Placeholder for slide/code snippet --}}
                            <div class="w-full h-full bg-white rounded-xl border border-neutral-200 shadow-sm p-4 flex flex-col gap-3">
                                <div class="w-1/3 h-2 bg-neutral-200 rounded-full"></div>
                                <div class="w-3/4 h-2 bg-neutral-200 rounded-full"></div>
                                <div class="w-2/3 h-2 bg-neutral-200 rounded-full"></div>
                                <div class="mt-auto flex justify-between items-end">
                                    <div class="w-12 h-12 bg-primary-100 rounded-full border-2 border-white shadow-sm flex items-center justify-center">
                                        <span class="font-display font-bold text-primary-900 text-xs">Mntr</span>
                                    </div>
                                    <div class="w-20 h-6 bg-accent-50 rounded-md border border-accent-100"></div>
                                </div>
                            </div>
                        </div>

                        {{-- Interface Content Below Video --}}
                        <div class="p-5 bg-white">
                            <p class="font-display font-bold text-primary-900 text-base mb-1">Membangun API dengan Laravel & Livewire</p>
                            <p class="font-body text-xs text-neutral-500 mb-4">Modul 4 • Bersama Mentor Mahasiswa Senior</p>
                            
                            {{-- Progress Bar Indicator --}}
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-body text-xs font-semibold text-neutral-600">Progres Modul</span>
                                <span class="font-display font-bold text-xs text-accent-500">75%</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-2">
                                <div class="bg-accent-500 h-2 rounded-full transition-all duration-1000" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating Element 1: Peer Mentoring Alert (Kiri) --}}
                    <div class="absolute -left-2 md:-left-8 top-16 md:top-32 bg-white p-3 md:p-4 rounded-xl shadow-[0_15px_35px_-10px_rgba(0,0,0,0.1)] border border-neutral-100 flex items-start gap-3 w-48 md:w-56 transform -rotate-3 hover:rotate-0 transition-all duration-500 z-20">
                        <div class="relative">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 shrink-0">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <span class="absolute -top-1 -right-1 flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                            </span>
                        </div>
                        <div>
                            <p class="font-display font-bold text-[11px] md:text-xs text-primary-900 mb-0.5">Diskusi Tugas</p>
                            <p class="font-body text-[10px] md:text-[11px] text-neutral-500 leading-tight line-clamp-2">"Kak, untuk setup Tailwind di Filament v3 bagaimana ya?"</p>
                        </div>
                    </div>

                    {{-- Floating Element 2: Skill Achieved (Kanan Bawah) --}}
                    <div class="absolute -right-2 md:-right-6 bottom-20 md:bottom-28 bg-white p-3 md:p-4 rounded-xl shadow-[0_15px_35px_-10px_rgba(0,0,0,0.1)] border border-neutral-100 flex items-center gap-3 w-48 md:w-56 transform rotate-3 hover:rotate-0 transition-all duration-500 z-20">
                        <div class="w-10 h-10 rounded-xl bg-accent-50 flex items-center justify-center text-accent-600 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-body text-[10px] text-neutral-500 font-semibold uppercase tracking-wider mb-0.5">Skill Baru</p>
                            <p class="font-display font-bold text-xs md:text-sm text-primary-900 leading-tight">Fullstack<br/>Architecture</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 2. Fitur Platform Section (Kenapa Ruang Dampak?) -->
    <section class="py-24 bg-white border-b border-slate-100 relative overflow-hidden">
    {{-- Background Decoration --}}
        <div class="absolute top-0 right-0 w-1/3 h-full bg-slate-50/50 -skew-x-12 transform origin-top translate-x-20 -z-10"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center max-w-2xl mx-auto mb-20">
                <h2 class="text-3xl md:text-4xl font-display font-black text-slate-900 mb-4 tracking-tight">Kenapa Ruang Dampak?</h2>
                <p class="text-slate-500 font-body text-base md:text-lg leading-relaxed">Platform <span class="text-primary-600 font-bold">end-to-end</span> yang dirancang untuk kesuksesan karirmu, bukan sekadar menonton video tutorial.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <div class="group bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-primary-200 transition-all duration-300">
                    <div class="w-14 h-14 bg-primary-50 rounded-xl flex items-center justify-center text-primary-600 mb-8 group-hover:scale-110 group-hover:bg-primary-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-book-open-reader text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-slate-900 mb-3 tracking-tight">Kurikulum Relevan Industri</h3>
                    <p class="text-slate-500 font-body text-sm leading-relaxed">Materi disusun berdasarkan kebutuhan industri agar skill yang kamu pelajari benar-benar relevan dengan standar dunia kerja saat ini.</p>
                </div>

                <div class="group bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-emerald-200 transition-all duration-300">
                    <div class="w-14 h-14 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-8 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-video text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-slate-900 mb-3 tracking-tight">Live Class Session</h3>
                    <p class="text-slate-500 font-body text-sm leading-relaxed">Dapatkan feedback langsung lewat sesi konsultasi interaktif bersama mentor praktisi top dari berbagai startup unicorn Indonesia.</p>
                </div>

                <div class="group bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-indigo-200 transition-all duration-300">
                    <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 mb-8 group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-briefcase text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-slate-900 mb-3 tracking-tight">Dukungan Karir Spesifik</h3>
                    <p class="text-slate-500 font-body text-sm leading-relaxed">Review CV, latihan interview, hingga rekomendasi langsung ke HR partner bagi talenta unggulan di ekosistem kami.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Section Program --}}
    <section class="py-24 bg-white relative overflow-hidden border-y border-neutral-100">
        {{-- Subtle dot pattern background khas Ruang Dampak --}}
        <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] bg-[size:20px_20px] opacity-40"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="text-center max-w-3xl mx-auto mb-16">
                
                {{-- H2 menggunakan font-semibold sesuai instruksi Design System --}}
                <h2 class="text-3xl md:text-4xl font-display font-semibold text-primary-900 mb-6 tracking-tight">Program Terpilih — Batch 5</h2>
                
                {{-- Copywriting disesuaikan dengan konsep "mentor mahasiswa" --}}
                <p class="text-neutral-500 mb-6 font-body text-lg leading-relaxed">Pilih program yang paling sesuai dengan tujuan karirmu dan mulai perjalanan transformasimu bersama mentor mahasiswa senior.</p>
                {{-- Badge Pendaftaran (Menggunakan aksen, rounded-xl, dan padding genap kelipatan 4) --}}
                <div class="flex flex-wrap justify-center items-center gap-4 mb-8">

                    {{-- Badge: Pendaftaran Dibuka --}}
                    <span class="inline-flex items-center gap-2 bg-accent-50 text-accent-600 text-xs font-display font-semibold px-5 py-2.5 rounded-xl tracking-wide uppercase border border-accent-100">
                        <span class="w-2.5 h-2.5 bg-accent-500 rounded-full animate-pulse"></span>
                        Pendaftaran Dibuka
                    </span>

                    {{-- Badge: Jadwal Tutup --}}
                    <span class="inline-flex items-center gap-2 bg-primary-50 text-primary-700 text-xs font-display font-semibold px-5 py-2.5 rounded-xl tracking-wide uppercase border border-primary-100">
                        <span class="w-2.5 h-2.5 bg-primary-400 rounded-full"></span>
                        Tutup 30 April 2026
                    </span>

                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programs as $program)
                    @php
                        $batch = $program->batches->first();
                        $enrolled = $batch ? $batch->enrollments_count : 12; // Dummy 12
                        $quota = $batch ? $batch->quota : 20; // Dummy 20
                        $slotPercent = ($enrolled / $quota) * 100;
                        
                        // Logika durasi (Bisa kamu sesuaikan di Controller nanti)
                        $duration = "2 Bulan"; 
                    @endphp

                    {{-- Card Wrapper: Menggunakan rounded-xl dan styling shadow yang lebih subtle --}}
                    <div class="group bg-white rounded-xl border border-neutral-200 overflow-hidden flex flex-col hover:shadow-xl hover:shadow-primary-900/5 hover:border-primary-200 transition-all duration-300">
                        <div class="relative aspect-video overflow-hidden bg-neutral-100">
                            <img src="{{ $program->thumbnail_url }}" alt="{{ $program->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            
                            {{-- Badge Kiri Atas: Tipe Program (Glassmorphism dihapus karena background cerah) --}}
                            <div class="absolute top-4 left-4 flex gap-2">
                                <span class="bg-white text-primary-900 text-[10px] font-display font-bold px-3 py-1.5 rounded-xl shadow-sm uppercase tracking-wider">
                                    {{ $program->type }}
                                </span>
                            </div>
                            
                            {{-- Badge Kanan Atas: Rating --}}
                            <div class="absolute top-4 right-4">
                                <span class="bg-white text-amber-500 text-xs font-display font-bold px-3 py-1.5 rounded-xl shadow-sm flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    4.9
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            {{-- Kategori --}}
                            <div class="flex items-center gap-2 mb-4">
                                <span class="text-[10px] font-display font-bold text-neutral-400 uppercase tracking-widest">{{ $program->category }}</span>
                                <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                                <span class="text-[10px] font-display font-bold text-accent-500 uppercase tracking-widest">Intensive</span>
                            </div>

                            {{-- Judul Program (Maksimal 2 baris agar tinggi card sejajar) --}}
                            <h3 class="text-xl font-display font-semibold text-primary-900 mb-6 leading-snug group-hover:text-accent-500 transition-colors line-clamp-2">
                                {{ $program->title }}
                            </h3>

                            {{-- Info Durasi & Kuota --}}
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center gap-3 text-neutral-500">
                                    <div class="w-10 h-10 rounded-xl bg-primary-50 flex items-center justify-center text-primary-900 shrink-0">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-[10px] uppercase font-display font-bold text-neutral-400 leading-none mb-1">Durasi</span>
                                        <span class="text-sm font-body font-bold text-neutral-700">{{ $duration }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 text-neutral-500">
                                    <div class="w-10 h-10 rounded-xl bg-primary-50 flex items-center justify-center text-primary-900 shrink-0">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-[10px] uppercase font-display font-bold text-neutral-400 leading-none mb-1">Kapasitas</span>
                                        <span class="text-sm font-body font-bold text-neutral-700">{{ $enrolled }}/{{ $quota }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Progress Slot (Warna progress diubah ke accent) --}}
                            <div class="mb-8">
                                <div class="w-full h-2 bg-neutral-100 rounded-xl overflow-hidden">
                                    <div class="h-full bg-accent-500 rounded-xl transition-all duration-1000" style="width: {{ $slotPercent }}%"></div>
                                </div>
                                @if($slotPercent > 70)
                                    <p class="text-[11px] text-amber-600 font-display font-bold mt-2.5 uppercase tracking-wide">🔥 Sisa {{ $quota - $enrolled }} slot lagi!</p>
                                @endif
                            </div>
                            
                            {{-- CTA Button (Menggunakan class primary sesuai aturan) --}}
                            <div class="mt-auto">
                                <a href="" class="block w-full text-center bg-primary-900 hover:bg-primary-800 text-white text-sm font-display font-semibold py-4 rounded-xl transition-all duration-300 shadow-lg shadow-primary-900/10">
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Empty State jika belum ada program --}}
                    <div class="col-span-full py-16 text-center border-2 border-dashed border-neutral-200 rounded-xl">
                        <p class="text-neutral-500 font-body text-lg">Belum ada program tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('program.index') }}" class="inline-flex items-center gap-3 text-primary-900 hover:text-accent-500 font-display font-bold text-base transition-colors group">
                    Lihat Semua Katalog Program 
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- 4. Mitra & Testimoni Section -->
    <section class="py-24 bg-neutral-50 border-t border-neutral-100 overflow-hidden">
        
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-display font-bold text-primary-950 mb-4 tracking-tight">Hiring Partner & Alumni</h2>
                <p class="text-neutral-500 font-body text-lg">Lulusan kami telah dipercaya dan bekerja di berbagai perusahaan teknologi terkemuka.</p>
            </div>
            
            <!-- Logo Grid (Mock placeholders) -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 items-center opacity-60 grayscale hover:grayscale-0 transition-all duration-500 mb-20 px-8">
                <!-- Logos would go here. Using abstract shapes/text as placeholders -->
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter">Mitra</div>
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter">TokMitra</div>
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter">Mitra</div>
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter">TraMitra</div>
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter hidden lg:block">BukMitra</div>
            </div>

            <!-- Testimonial Simple Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 max-w-5xl mx-auto">
                <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm relative">
                    <svg class="absolute top-8 right-8 text-neutral-100 w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    <p class="text-neutral-600 font-body text-lg leading-relaxed mb-8 relative z-10">"Platform ini tidak hanya mengajarkan teori, tetapi praktik langsung yang sangat mendekati dunia kerja nyata. Seminggu setelah lulus saya langsung dapat penawaran interview."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-neutral-200 rounded-full overflow-hidden shrink-0"><img src="https://i.pravatar.cc/100?img=5" alt="Avatar"></div>
                        <div>
                            <p class="font-display font-bold text-primary-950">Budi Santoso</p>
                            <p class="text-sm text-neutral-500 font-body">Frontend Developer, Startup XYZ</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm relative">
                    <svg class="absolute top-8 right-8 text-neutral-100 w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    <p class="text-neutral-600 font-body text-lg leading-relaxed mb-8 relative z-10">"Mentor yang disediakan sangat suportif dan berpengalaman. Saya sebagai orang awam yang tadinya tidak tahu apa-apa bisa mengerti alur kerja project sungguhan."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-neutral-200 rounded-full overflow-hidden shrink-0"><img src="https://i.pravatar.cc/100?img=9" alt="Avatar"></div>
                        <div>
                            <p class="font-display font-bold text-primary-950">Siti Aisyah</p>
                            <p class="text-sm text-neutral-500 font-body">UI/UX Designer, Agency ABC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Final CTA -->
    <section class="py-24 bg-white relative overflow-hidden">
        
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="bg-primary-950 rounded-3xl p-10 md:p-16 text-center shadow-2xl overflow-hidden relative">
                <!-- Decorative background ring -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 rounded-full border-[20px] border-primary-800/30 opacity-50 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 rounded-full border-[15px] border-primary-800/20 opacity-50 pointer-events-none"></div>
                
                <h2 class="text-2xl md:text-4xl font-display font-bold text-white mb-4 tracking-tight relative z-10">Mulai Bersama Sekarang.</h2>
                <p class="text-sm md:text-xl text-primary-200 font-body mb-8 max-w-2xl mx-auto relative z-10">
                    Ribuan murid telah mentransformasi karirnya lewat platform ini. Waktu terbaikmu untuk memulai adalah hari ini.
                </p>
                <div class="relative z-10 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}">
                        <button class="bg-white text-primary-950 hover:bg-neutral-100 px-8 py-4 rounded-full font-display font-semibold transition-colors text-lg w-full sm:w-auto">
                            Daftar Sekarang Secara Gratis
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
