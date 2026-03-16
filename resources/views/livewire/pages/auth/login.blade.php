<?php
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layout.auth')] class extends Component {
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();

        // Redirect logic berdasarkan Role
        $role = auth()->user()->role;
        $redirectUrl = match($role) {
            'mentor'  => route('mentor.dashboard'),
            'mitra'   => route('mitra.dashboard'),
            'admin'   => '/admin',
            default   => route('peserta.dashboard'),
        };

        $this->redirectIntended(default: $redirectUrl, navigate: true);
    }
}; ?>

<div>
    <x-slot:title>Masuk - Ruang Dampak</x-slot:title>

    <div class="mb-10">
        <h2 class="text-3xl font-display font-black text-primary-950 mb-2 tracking-tight">Selamat Datang Kembali</h2>
        <p class="text-neutral-500 font-body text-sm">Masuk ke akun Ruang Dampak kamu.</p>
    </div>

    @if (session('status'))
        <div class="mb-6">
            <x-ui.alert type="success">
                {{ session('status') }}
            </x-ui.alert>
        </div>
    @endif

    <form wire:submit="login" class="space-y-5" x-data="{ showPassword: false }">
        
        {{-- Input Email (menggunakan Form Object $form.email) --}}
        <div>
            <x-ui.input label="Email" wire:model="form.email" type="email" placeholder="nama@email.com" required autofocus autocomplete="username" />
            @error('form.email') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        {{-- Input Password dengan Toggle --}}
        <div class="relative">
            <x-ui.input label="Password" wire:model="form.password" x-bind:type="showPassword ? 'text' : 'password'" required autocomplete="current-password" />
            <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-9 text-neutral-400 hover:text-primary-600 focus:outline-none">
                <i class="fa-regular fa-eye" x-show="!showPassword"></i>
                <i class="fa-regular fa-eye-slash" x-show="showPassword" style="display: none;"></i>
            </button>
            @error('form.password') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        {{-- Remember Me & Forgot Password --}}
        <div class="flex items-center justify-between pt-2">
            <label for="remember" class="flex items-center gap-2 cursor-pointer">
                <input wire:model="form.remember" id="remember" type="checkbox" class="w-4 h-4 rounded border-neutral-300 text-primary-900 focus:ring-primary-900">
                <span class="font-body text-sm text-neutral-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate class="text-sm font-display font-bold text-accent-teal hover:text-primary-800 transition-colors">
                    Lupa password?
                </a>
            @endif
        </div>

        <x-ui.button variant="primary" type="submit" class="w-full py-4 text-base mt-6 justify-center">
            Masuk
        </x-ui.button>
    </form>

    <div class="mt-8 text-center border-t border-neutral-100 pt-8">
        <p class="font-body text-sm text-neutral-500">
            Belum punya akun? 
            <a href="{{ route('register') }}" wire:navigate class="font-display font-bold text-accent-teal hover:text-primary-800 transition-colors">Daftar sekarang &rarr;</a>
        </p>
    </div>
</div>