<x-layout.app navTheme="light">
    <x-slot:title>Segera Hadir - Ruang Dampak</x-slot:title>

    <div class="relative bg-neutral-50 min-h-screen flex items-center justify-center p-4 overflow-hidden">
        {{-- Background Glow Ringkas --}}
        <div class="absolute w-[500px] h-[500px] bg-accent-teal/20 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="w-full max-w-lg relative z-10 text-center">
            <x-ui.card class="bg-white/80 backdrop-blur-lg border-neutral-200 shadow-2xl p-10 rounded-[2rem]">
                
                {{-- Icon Minimalis --}}
                <div class="w-20 h-20 mx-auto bg-primary-950 text-accent-teal rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <i class="fa-solid fa-comments text-3xl"></i> {{-- Ganti icon sesuai kebutuhan --}}
                </div>

                <x-ui.badge variant="subtle" type="info" class="mb-4">Segera Hadir</x-ui.badge>

                <h1 class="text-3xl font-display font-black text-primary-950 mb-3 tracking-tight">
                    Sedang Dibangun.
                </h1>

                <p class="text-neutral-500 font-body leading-relaxed mb-8">
                    Kami sedang menyiapkan fitur ini agar pengalamanmu di Ruang Dampak menjadi lebih maksimal. Harap nantikan pembaruannya!
                </p>

                {{-- Tombol Aksi --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <x-ui.button variant="outline" href="/" wire:navigate class="justify-center w-full sm:w-auto">
                        Kembali
                    </x-ui.button>
                    <x-ui.button variant="primary" href="{{ route('program.index') }}" wire:navigate class="justify-center w-full sm:w-auto">
                        Eksplorasi Program
                    </x-ui.button>
                </div>

            </x-ui.card>
        </div>
    </div>
</x-layout.app>