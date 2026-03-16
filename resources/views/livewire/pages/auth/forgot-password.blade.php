<?php
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layout.auth')] class extends Component {
    // ... Pertahankan logic asli Breeze di sini ...
}; ?>

<div>
    <x-slot:title>Lupa Password - Ruang Dampak</x-slot:title>

    <div class="mb-8">
        <a href="{{ route('login') }}" wire:navigate class="inline-flex items-center gap-2 text-sm font-display font-bold text-neutral-400 hover:text-primary-950 transition-colors mb-6">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Login
        </a>
        <h2 class="text-3xl font-display font-black text-primary-950 mb-2 tracking-tight">Lupa Password?</h2>
        <p class="text-neutral-500 font-body text-sm leading-relaxed">Masukkan email kamu, kami akan kirim link untuk reset password.</p>
    </div>

    @if (session('status'))
        <div class="mb-6">
            <x-ui.alert type="success">
                {{ session('status') }}
            </x-ui.alert>
        </div>
    @endif

    <form wire:submit="sendPasswordResetLink" class="space-y-5">
        <div>
            <x-ui.input label="Email" wire:model="email" type="email" required autofocus />
            @error('email') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        <x-ui.button variant="primary" type="submit" class="w-full py-4 mt-2 justify-center">
            Kirim Link Reset
        </x-ui.button>
    </form>
</div>