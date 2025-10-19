<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component // ← изменили на auth
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $userId = '';
    public function mount(): void
    {
        // Получаем user_id из GET-параметра если он есть
        $this->userId = request('user_id', '');

        // Если передан user_id, используем его как имя
        if ($this->userId) {
            $this->name = $this->userId;
        }
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('bilder.index', absolute: false), navigate: true);
    }
}; ?>

<div class="custom-auth-container">
    <form wire:submit="register" class="custom-auth-form">
        <!-- Name -->
        <div class="custom-form-group">
            <x-input-label for="name" value="Имя" class="custom-label" />
            <x-text-input wire:model="name" id="name"
                          class="custom-input block mt-1 w-full"
                          type="text" name="name" value="{{ $userId ?? '' }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="custom-error mt-2" />
        </div>

        <!-- Email Address -->
        <div class="custom-form-group mt-4">
            <x-input-label for="email" value="Email" class="custom-label" />
            <x-text-input wire:model="email" id="email"
                          class="custom-input block mt-1 w-full"
                          type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="custom-error mt-2" />
        </div>

        <!-- Password -->
        <div class="custom-form-group mt-4">
            <x-input-label for="password" value="Пароль" class="custom-label" />
            <x-text-input wire:model="password" id="password"
                          class="custom-input block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="custom-error mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="custom-form-group mt-4">
            <x-input-label for="password_confirmation" value="Подтвердите пароль" class="custom-label" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation"
                          class="custom-input block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="custom-error mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6 text_and_butSingUp">
            <button type="submit" class="custom-button">
                Зарегистрироваться
            </button>
            <a class="custom-link underline text-sm text-gray-600 hover:text-gray-900 rounded-md "
               href="{{ route('login') }}" wire:navigate>
                Уже зарегистрированы?
            </a>


        </div>
    </form>
</div>
