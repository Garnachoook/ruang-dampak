<x-layout.app>
    <!-- 1. Hero Section -->
    <section class="relative bg-white pt-28 pb-20 overflow-hidden border-b border-neutral-100">
        <x-ui.background-pattern />
        
        {{-- Floating Card 1: Live Session --}}
        <div class="hidden lg:flex absolute left-8 xl:left-20 top-1/4 flex-col gap-3 bg-white p-4 rounded-2xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] border border-neutral-100 w-64 transform -rotate-6 hover:rotate-0 transition-all duration-500 z-10">
            
            {{-- Header Content --}}
            <div class="flex items-center gap-3">
                {{-- Video Icon Container --}}
                <div class="w-10 h-10 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-primary-600 shrink-0">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                
                <div>
                    <p class="font-display font-bold text-sm text-primary-950">Live Mentoring</p>
                    {{-- Blinking Status --}}
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <p class="font-body text-[10px] text-emerald-600 font-bold uppercase tracking-wider">Mulai 19:00 WIB</p>
                    </div>
                </div>
            </div>
            
            {{-- Message Box --}}
            <div class="bg-neutral-50 p-2.5 rounded-xl border border-neutral-100">
                <p class="font-display font-semibold text-xs text-primary-950 mb-1">Q&A Session</p>
                <p class="font-body text-[11px] text-neutral-500 leading-tight">"Jangan lupa siapkan pertanyaan terbaikmu untuk sesi malam ini!"</p>
            </div>
            
            {{-- Faux Action Button --}}
            <div class="w-full bg-primary-950 text-white text-center text-[11px] font-display font-bold py-2 rounded-lg mt-1 opacity-90 shadow-sm">
                Bersiap Masuk Room →
            </div>
        </div>

        {{-- Floating Card 2: Modul --}}
        <div class="hidden lg:flex absolute right-8 xl:right-20 bottom-1/4 flex-col gap-3 bg-white p-4 rounded-2xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] border border-neutral-100 w-60 transform rotate-6 hover:rotate-0 transition-all duration-500 z-0">
            <div class="flex items-center justify-between mb-1">
                <span class="font-display font-bold text-sm text-primary-950">Progres Modul</span>
                <span class="font-display font-bold text-sm text-primary-600">85%</span>
            </div>
            <x-ui.progres-bar value="85" color="primary" />
            <div class="flex items-center gap-2 mt-2 bg-neutral-50 p-2 rounded-xl border border-neutral-100">
                <svg class="w-4 h-4 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <p class="font-body text-[11px] text-neutral-600 leading-tight">Sisa 2 tugas menuju sertifikasi.</p>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <x-ui.badge color="neutral" class="mb-6 inline-flex bg-primary-100 text-primary-600 border-none px-4 py-1.5 rounded-full font-medium">✨ Peluang Baru untuk Karirmu</x-ui.badge>
            
            <h1 class="text-5xl md:text-7xl font-display font-black text-primary-950 tracking-tight leading-[1.1] max-w-4xl mx-auto mb-8">
                Belajar Keterampilan Baru,<br/>
                <span class="text-primary-600">Wujudkan Potensi Terbaikmu.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-neutral-500 font-body max-w-2xl mx-auto leading-relaxed mb-10">
                Pendidikan relevan industri dari praktisi ahli. Belajar melalui proyek nyata, bangun portofolio, dan temukan pekerjaan impianmu di satu platform.
            </p>
       
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}">
                    <button class="bg-primary-950 text-white hover:bg-primary-800 px-8 py-3.5 rounded-full font-display font-semibold transition-all shadow-lg shadow-primary-950/20 text-md w-full sm:w-auto">
                        Mulai Belajar Sekarang
                    </button>
                </a>
                <a href="{{ route('program.index') }}">
                    <button class="bg-white text-neutral-700 border border-neutral-200 hover:border-neutral-300 hover:bg-neutral-50 px-8 py-3.5 rounded-full font-display font-semibold transition-all text-md w-full sm:w-auto">
                        Eksplorasi Program
                    </button>
                </a>
            </div>

            <!-- Minimalist Stats -->
            <div class="mt-5 pt-5 border-neutral-100 flex flex-wrap justify-center gap-12 sm:gap-20 text-center">
                <div>
                    <p class="text-3xl font-display font-bold text-primary-950">1,200+</p>
                    <p class="text-sm font-body text-neutral-500 mt-1">Lulusan Batch</p>
                </div>
                <div>
                    <p class="text-3xl font-display font-bold text-primary-950">50+</p>
                    <p class="text-sm font-body text-neutral-500 mt-1">Hiring Partners</p>
                </div>
                <div>
                    <p class="text-3xl font-display font-bold text-primary-950">92%</p>
                    <p class="text-sm font-body text-neutral-500 mt-1">Tingkat Penempatan</p>
                </div>
            </div>
        </div>
    </section>

    

    <!-- 2. Fitur Platform Section (Kenapa Ruang Dampak?) -->
    <section class="py-24 bg-neutral-50 border-b border-neutral-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-display font-bold text-primary-950 mb-4 tracking-tight">Kenapa Ruang Dampak?</h2>
                <p class="text-neutral-500 font-body text-lg">Platform end-to-end yang dirancang untuk kesuksesan karirmu, bukan sekadar menonton video tutorial.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-primary-50 rounded-2xl flex items-center justify-center text-primary-600 mb-6 font-display font-bold text-xl">01</div>
                    <h3 class="text-xl font-display font-bold text-primary-950 mb-3 tracking-tight">Kurikulum Relevan Industri</h3>
                    <p class="text-neutral-500 font-body leading-relaxed">Materi disusun berdasarkan kebutuhan industri agar skill yang kamu pelajari benar-benar relevan dengan dunia kerja.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 mb-6 font-display font-bold text-xl">02</div>
                    <h3 class="text-xl font-display font-bold text-primary-950 mb-3 tracking-tight">Live Class Session</h3>
                    <p class="text-neutral-500 font-body leading-relaxed">Dapatkan feedback langsung dengan jadwal konsultasi privat bersama mentor praktisi top dari berbagai startup unicorn.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 mb-6 font-display font-bold text-xl">03</div>
                    <h3 class="text-xl font-display font-bold text-primary-950 mb-3 tracking-tight">Dukungan Karir Spesifik</h3>
                    <p class="text-neutral-500 font-body leading-relaxed">Review CV, latihan interview, dan rekomendasi langsung HR perusahaan bagi talenta unggulan dalam jejaring kami.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Program Batch Section -->
    <section class="py-24 bg-neutral-50/60 relative overflow-hidden border-y border-neutral-100">
        <!-- Subtle dot pattern background -->
        <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] bg-[size:20px_20px] opacity-40"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Header with Batch Announcement -->
            <div class="text-center max-w-3xl mx-auto mb-6">
                <span class="inline-flex items-center gap-1.5 bg-primary-100 text-primary-700 text-xs font-bold px-4 py-1.5 rounded-full mb-5 font-body tracking-wide uppercase">
                    <span class="w-2 h-2 bg-primary-500 rounded-full animate-pulse"></span>
                    Pendaftaran Dibuka
                </span>
                <h2 class="text-3xl md:text-4xl font-display font-bold text-primary-950 mb-4 tracking-tight">Program Bootcamp — Batch 5</h2>
                <p class="text-neutral-500 font-body text-lg leading-relaxed">Pilih program yang paling sesuai dengan tujuan karirmu dan mulai perjalanan transformasimu.</p>
            </div>

            <!-- Date Info Banner -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-8 mb-14">
                <div class="flex items-center gap-2.5 bg-white border border-neutral-200 rounded-full px-5 py-2.5 shadow-sm">
                    <svg class="w-4 h-4 text-primary-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span class="text-sm font-body"><span class="text-neutral-500">Mulai:</span> <span class="font-semibold text-primary-950">14 April 2026</span></span>
                </div>
                <div class="flex items-center gap-2.5 bg-amber-50 border border-amber-200 rounded-full px-5 py-2.5 shadow-sm">
                    <svg class="w-4 h-4 text-amber-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-body"><span class="text-neutral-500">Pendaftaran ditutup:</span> <span class="font-semibold text-amber-800">7 April 2026</span></span>
                </div>
            </div>
            
            <!-- Program Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @forelse($programs as $program)
                    @php
                        $batch = $program->batches->first();
                        $enrolled = $batch ? $batch->enrollments_count : 0;
                        $quota = $batch ? $batch->quota : 24;
                        $slotPercent = $quota > 0 ? round(($enrolled / $quota) * 100) : 0;
                        $duration = $program->type === 'bootcamp' ? '3 Bulan' : '6 Minggu';
                        $rating = match(true) {
                            str_contains(strtolower($program->title), 'full-stack') => 4.9,
                            str_contains(strtolower($program->title), 'react')      => 4.8,
                            default => 4.7,
                        };
                    @endphp
                    <div class="group bg-white rounded-2xl border border-neutral-200/80 overflow-hidden flex flex-col hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 ease-out">
                        <!-- Thumbnail -->
                        <div class="aspect-[16/10] bg-neutral-100 relative overflow-hidden">
                            @if($program->thumbnail_url)
                                <img src="{{ $program->thumbnail_url }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary-100 via-primary-50 to-neutral-100 flex items-center justify-center">
                                    <span class="text-primary-300 font-display font-bold text-3xl opacity-50">{{ Str::substr($program->title, 0, 2) }}</span>
                                </div>
                            @endif
                            <!-- Gradient overlay on hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <!-- Type Badge -->
                            <div class="absolute top-3.5 left-3.5">
                                <span class="bg-white/95 backdrop-blur-sm text-primary-950 text-[11px] font-bold px-3 py-1 rounded-full shadow-sm uppercase tracking-wider">{{ ucfirst($program->program_type ?? $program->type) }}</span>
                            </div>
                            <!-- Rating Badge -->
                            <div class="absolute top-3.5 right-3.5">
                                <span class="bg-white/95 backdrop-blur-sm text-amber-600 text-xs font-bold px-2.5 py-1 rounded-full shadow-sm flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 fill-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    {{ $rating }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-display font-bold text-primary-950 mb-1 tracking-tight group-hover:text-primary-700 transition-colors">{{ $program->title }}</h3>
                            @if($batch)
                                <p class="text-xs text-primary-600 font-semibold font-body mb-3">{{ $batch->name }}</p>
                            @endif

                            <!-- Meta Info -->
                            <div class="flex items-center gap-4 mb-4">
                                <div class="flex items-center gap-1.5 text-neutral-500">
                                    <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span class="text-xs font-body font-medium">{{ $duration }}</span>
                                </div>
                                <div class="flex items-center gap-1.5 text-neutral-500">
                                    <svg class="w-4 h-4 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span class="text-xs font-body font-medium">{{ $enrolled }}/{{ $quota }} slot</span>
                                </div>
                            </div>

                            <!-- Slot Progress Bar -->
                            <div class="mb-5">
                                <div class="w-full h-1.5 bg-neutral-100 rounded-full overflow-hidden">
                                    <div class="h-full rounded-full transition-all duration-500 {{ $slotPercent > 75 ? 'bg-amber-500' : 'bg-primary-500' }}" style="width: {{ $slotPercent }}%"></div>
                                </div>
                                @if($slotPercent > 75)
                                    <p class="text-[11px] text-amber-600 font-semibold font-body mt-1.5">⚡ Slot hampir penuh!</p>
                                @endif
                            </div>
                            
                            <!-- CTA -->
                            <div class="mt-auto">
                                <a href="{{ route('program.show', $program->slug) }}" class="block w-full text-center bg-primary-950 hover:bg-primary-800 text-white text-sm font-display font-semibold py-3 rounded-xl transition-colors duration-200">
                                    Daftar Sekarang →
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 bg-white rounded-2xl border border-neutral-200/80 text-center text-neutral-400 font-body">
                        <svg class="w-12 h-12 mx-auto mb-4 text-neutral-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Belum ada program yang tersedia saat ini.
                    </div>
                @endforelse
            </div>
            
            <!-- Bottom CTA -->
            <div class="mt-12 text-center">
                <a href="{{ route('program.index') }}" class="inline-flex items-center gap-2 bg-white border border-neutral-200 hover:border-primary-300 text-primary-700 hover:text-primary-800 px-7 py-3 rounded-full font-display font-semibold transition-all duration-200 shadow-sm hover:shadow-md">
                    Lihat Semua Program
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
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
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter">Gojek.</div>
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter">Tokopedia</div>
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter">Shopee</div>
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter">Traveloka</div>
                <div class="font-display font-bold text-xl text-center text-neutral-800 tracking-tighter hidden lg:block">Bukalapak</div>
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
