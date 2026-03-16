<?php
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layout.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = 'peserta'; // Default role

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:peserta,mitra,mentor'], // <-- Menambahkan mentor ke validasi
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        event(new Registered($user));
        Auth::login($user);

        // Redirect logic berdasarkan Role yang baru
        $redirectUrl = match($user->role) {
            'mentor'  => route('mentor.dashboard'), // <-- Redirect untuk mentor
            'mitra'   => route('mitra.dashboard'),
            default   => route('peserta.dashboard'),
        };

        $this->redirect($redirectUrl, navigate: true);
    }
}; ?>

<div>
    <x-slot:title>Daftar Akun - Ruang Dampak</x-slot:title>

    <div class="mb-8">
        <h2 class="text-3xl font-display font-black text-primary-950 mb-2 tracking-tight">Buat Akun Baru</h2>
        <p class="text-neutral-500 font-body text-sm">Mulai perjalananmu di ekosistem Ruang Dampak.</p>
    </div>

    <form wire:submit="register" class="space-y-5" x-data="{ showPassword: false, showConfirm: false, role: @entangle('role') }">
        
        {{-- Role Selection Cards (Sekarang 3 Kolom) --}}
        <div class="space-y-2">
            <label class="font-display font-semibold text-sm text-neutral-700">Daftar Sebagai</label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                
                {{-- Card Peserta --}}
                <div @click="role = 'peserta'" :class="role === 'peserta' ? 'border-primary-900 bg-primary-50 ring-1 ring-primary-900' : 'border-neutral-200'" class="border-2 rounded-xl p-3 cursor-pointer transition-all">
                    <div class="text-2xl mb-1">🎓</div>
                    <p class="font-display font-bold text-sm text-primary-950 mb-0.5">Peserta</p>
                    <p class="font-body text-[11px] text-neutral-500 leading-tight">Ikuti kelas & mentoring</p>
                </div>

                {{-- Card Mentor --}}
                <div @click="role = 'mentor'" :class="role === 'mentor' ? 'border-primary-900 bg-primary-50 ring-1 ring-primary-900' : 'border-neutral-200'" class="border-2 rounded-xl p-3 cursor-pointer transition-all">
                    <div class="text-2xl mb-1">💡</div>
                    <p class="font-display font-bold text-sm text-primary-950 mb-0.5">Mentor</p>
                    <p class="font-body text-[11px] text-neutral-500 leading-tight">Bimbing talenta & review</p>
                </div>

                {{-- Card Mitra --}}
                <div @click="role = 'mitra'" :class="role === 'mitra' ? 'border-primary-900 bg-primary-50 ring-1 ring-primary-900' : 'border-neutral-200'" class="border-2 rounded-xl p-3 cursor-pointer transition-all">
                    <div class="text-2xl mb-1">🏢</div>
                    <p class="font-display font-bold text-sm text-primary-950 mb-0.5">Mitra</p>
                    <p class="font-body text-[11px] text-neutral-500 leading-tight">Rekrut & post lowongan</p>
                </div>

            </div>
            @error('role') <p class="text-xs font-body text-rose-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <x-ui.input label="Nama Lengkap" wire:model="name" type="text" placeholder="John Doe" required autofocus />
            @error('name') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        <div>
            <x-ui.input label="Email" wire:model="email" type="email" placeholder="nama@email.com" required />
            @error('email') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        <div class="relative">
            <x-ui.input label="Password" wire:model="password" x-bind:type="showPassword ? 'text' : 'password'" placeholder="Minimal 8 karakter" required />
            <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-9 text-neutral-400 hover:text-primary-600 focus:outline-none">
                <i class="fa-regular fa-eye" x-show="!showPassword"></i>
                <i class="fa-regular fa-eye-slash" x-show="showPassword" style="display: none;"></i>
            </button>
            @error('password') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        <div class="relative">
            <x-ui.input label="Konfirmasi Password" wire:model="password_confirmation" x-bind:type="showConfirm ? 'text' : 'password'" required />
            <button type="button" @click="showConfirm = !showConfirm" class="absolute right-4 top-9 text-neutral-400 hover:text-primary-600 focus:outline-none">
                <i class="fa-regular fa-eye" x-show="!showConfirm"></i>
                <i class="fa-regular fa-eye-slash" x-show="showConfirm" style="display: none;"></i>
            </button>
            @error('password_confirmation') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-start gap-2 pt-2">
            <input type="checkbox" id="terms" required class="mt-1 w-4 h-4 rounded border-neutral-300 text-primary-900 focus:ring-primary-900">
            <label for="terms" class="font-body text-xs text-neutral-600 leading-relaxed">
                Saya setuju dengan <a href="#" class="text-accent-teal font-semibold hover:underline">syarat & ketentuan</a> Ruang Dampak.
            </label>
        </div>

        <x-ui.button variant="primary" type="submit" class="w-full py-4 text-base mt-2 justify-center">
            Daftar Sekarang
        </x-ui.button>
    </form>

    <div class="mt-8 text-center">
        <p class="font-body text-sm text-neutral-500">
            Sudah punya akun? 
            <a href="{{ route('login') }}" wire:navigate class="font-display font-bold text-accent-teal hover:text-primary-800 transition-colors">Masuk di sini &rarr;</a>
        </p>
    </div>
</div>