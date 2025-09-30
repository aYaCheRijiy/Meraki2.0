<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="custom-auth-container">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="custom-auth-form">
        <!-- Email -->
        <div class="custom-form-group">
            <x-input-label for="email" value="Email" class="custom-label" />
            <x-text-input wire:model="form.email" id="email"
                          class="custom-input block mt-1 w-full"
                          type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="custom-error mt-2" />
        </div>

        <!-- Password -->
        <div class="custom-form-group mt-4">
            <x-input-label for="password" value="Пароль" class="custom-label" />
            <x-text-input wire:model="form.password" id="password"
                          class="custom-input block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('form.password')" class="custom-error mt-2" />
        </div>

        <!-- Remember Me & Links -->
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                       class="custom-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <label for="remember" class="custom-checkbox-text ms-2 text-sm text-gray-600">
                    Запомнить меня
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="custom-link text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('password.request') }}" wire:navigate>
                    Забыли пароль?
                </a>
            @endif
        </div>

        <!-- Submit Button & Register Link -->
        <div class="flex flex-col gap-3 mt-6">
            <button type="submit" class="custom-button w-full">
                Войти
            </button>

            <div class="text-center">
                <span class="text-sm text-gray-600">Нет аккаунта? </span>
                <a class="navtab navtabSingUp text-sm font-medium text-blue-600 hover:text-blue-500"
                   href="{{ route('register') }}" wire:navigate>
                    Зарегистрироваться
                </a>
            </div>
        </div>
    </form>
</div>
