<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div>
    <x-slot:title>Reset Password - Ruang Dampak</x-slot:title>

    <div class="mb-8">
        <h2 class="text-3xl font-display font-black text-primary-950 mb-2 tracking-tight">Buat Password Baru</h2>
    </div>

    <form wire:submit="resetPassword" class="space-y-5" x-data="{ showPassword: false, showConfirm: false }">
        
        <div>
            <x-ui.input label="Email" wire:model="email" type="email" required autofocus readonly class="bg-neutral-50 text-neutral-500" />
            @error('email') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        <div class="relative">
            <x-ui.input label="Password Baru" wire:model="password" x-bind:type="showPassword ? 'text' : 'password'" required />
            <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-9 text-neutral-400">
                <i class="fa-regular fa-eye" x-show="!showPassword"></i>
                <i class="fa-regular fa-eye-slash" x-show="showPassword" style="display: none;"></i>
            </button>
            @error('password') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        <div class="relative">
            <x-ui.input label="Konfirmasi Password Baru" wire:model="password_confirmation" x-bind:type="showConfirm ? 'text' : 'password'" required />
            <button type="button" @click="showConfirm = !showConfirm" class="absolute right-4 top-9 text-neutral-400">
                <i class="fa-regular fa-eye" x-show="!showConfirm"></i>
                <i class="fa-regular fa-eye-slash" x-show="showConfirm" style="display: none;"></i>
            </button>
            @error('password_confirmation') <p class="text-xs font-body text-rose-500 mt-1 pl-4">{{ $message }}</p> @enderror
        </div>

        <x-ui.button variant="primary" type="submit" class="w-full py-4 mt-4 justify-center">
            Reset Password
        </x-ui.button>
    </form>
</div>
