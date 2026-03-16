<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Ruang Dampak' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-body text-neutral-900 min-h-screen flex bg-primary-950 antialiased overflow-x-hidden">
    
    {{-- Kolom Kiri: Branding (Hidden di Mobile) --}}
    <div class="hidden lg:flex lg:w-[45%] relative flex-col justify-between p-12 xl:p-16 border-r border-primary-900/50">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent-teal rounded-full blur-[120px] opacity-20 -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>

        <div class="relative z-10">
            <a href="/" wire:navigate class="inline-block text-3xl font-display font-black text-white tracking-tight mb-16">
                Ruang<span class="text-accent-teal">Dampak.</span>
            </a>

            <h1 class="text-4xl xl:text-5xl font-display font-black text-white leading-[1.15] tracking-tight mb-6">
                Belajar Lebih Dalam, <br/>
                <span class="text-primary-300">Berkarir Lebih Jauh.</span>
            </h1>
            
            <div class="space-y-5 mt-10">
                @foreach([
                    ['icon' => 'fa-video', 'text' => 'Live session 2× seminggu bersama mentor praktisi.'],
                    ['icon' => 'fa-layer-group', 'text' => 'Modul terstruktur per minggu berbasis proyek nyata.'],
                    ['icon' => 'fa-certificate', 'text' => 'Sertifikat kelulusan yang diakui oleh Hiring Partner.']
                ] as $item)
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary-900 border border-primary-800 flex items-center justify-center text-accent-teal shrink-0">
                        <i class="fa-solid {{ $item['icon'] }} text-xs"></i>
                    </div>
                    <p class="font-body text-primary-100 text-lg leading-snug pt-1">{{ $item['text'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Mini Stats Glass Card --}}
        <div class="relative z-10 mt-12 bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-5 inline-flex items-center gap-4 w-fit">
            <div class="flex -space-x-3">
                <div class="w-10 h-10 rounded-full border-2 border-primary-950 bg-primary-800 flex items-center justify-center text-xs text-white"><i class="fa-solid fa-user"></i></div>
                <div class="w-10 h-10 rounded-full border-2 border-primary-950 bg-primary-700 flex items-center justify-center text-xs text-white"><i class="fa-solid fa-user"></i></div>
                <div class="w-10 h-10 rounded-full border-2 border-primary-950 bg-primary-600 flex items-center justify-center text-xs text-white"><i class="fa-solid fa-user"></i></div>
            </div>
            <div>
                <p class="font-display font-bold text-white text-sm">1.200+ Peserta Aktif</p>
                <p class="font-body text-primary-300 text-xs">Dibimbing 20+ Mentor Expert</p>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Form --}}
    <div class="w-full lg:w-[55%] bg-white lg:rounded-l-3xl flex flex-col justify-center px-6 py-12 sm:px-12 lg:px-20 xl:px-28 relative shadow-[-20px_0_50px_rgba(0,0,0,0.2)] z-20 min-h-screen overflow-y-auto">
        
        <div class="lg:hidden mb-10 text-center">
            <a href="/" wire:navigate class="inline-block text-3xl font-display font-black text-primary-950 tracking-tight">
                Ruang<span class="text-primary-600">Dampak.</span>
            </a>
        </div>

        <div class="w-full max-w-md mx-auto">
            {{ $slot }}
        </div>
    </div>
</body>
</html>