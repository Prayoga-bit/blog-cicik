<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
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

<div class="bg-brand-light min-h-screen flex flex-col justify-center">
    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20">

        {{-- Page Heading --}}
        <div class="text-center mb-16">
            <h1 class="font-cursive text-[72px] leading-none text-brand-dark mb-6">Welcome Back</h1>
            <p class="text-brand-gray text-xl">
                Sign in to access your dashboard and manage your account.
            </p>
        </div>

        {{-- Login Card --}}
        <div class="max-w-md mx-auto">
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-12">

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 text-sm text-brand-green font-medium bg-brand-green/10 rounded-lg px-4 py-3">
                        {{ session('status') }}
                    </div>
                @endif

                <h2 class="text-2xl font-bold text-brand-dark mb-2">Sign In</h2>
                <p class="text-brand-gray mb-8 text-sm">Enter your credentials to continue.</p>

                <form wire:submit="login" class="flex flex-col gap-6">
                    {{-- Email --}}
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-sm font-medium text-[#364153]">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-brand-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                            <input
                                wire:model="form.email"
                                id="email"
                                type="email"
                                name="email"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="your.email@example.com"
                                class="w-full bg-[#f3f3f5] border border-gray-200 rounded-lg pl-11 pr-3 py-3 text-sm text-brand-dark placeholder-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition"
                            />
                        </div>
                        @error('form.email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Password --}}
                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-sm font-medium text-[#364153]">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-brand-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                            </svg>
                            <input
                                wire:model="form.password"
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                class="w-full bg-[#f3f3f5] border border-gray-200 rounded-lg pl-11 pr-3 py-3 text-sm text-brand-dark placeholder-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-transparent transition"
                            />
                        </div>
                        @error('form.password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Remember Me & Forgot Password --}}
                    <div class="flex items-center justify-between">
                        <label for="remember" class="inline-flex items-center">
                            <input wire:model="form.remember" id="remember" type="checkbox" name="remember"
                                class="rounded border-gray-300 text-brand-green shadow-sm focus:ring-brand-green">
                            <span class="ms-2 text-sm text-brand-gray">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-brand-green font-medium hover:underline" href="{{ route('password.request') }}" wire:navigate>
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-brand-green hover:bg-brand-green/90 text-white font-medium text-lg py-3 rounded-lg transition"
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-75 cursor-not-allowed"
                    >
                        <svg wire:loading.remove class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                        </svg>
                        <svg wire:loading class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>
                        {{ __('Log in') }}
                    </button>
                </form>

                {{-- Register Link --}}
                @if (Route::has('register'))
                    <p class="text-center text-sm text-brand-gray mt-8">
                        Don't have an account?
                        <a href="{{ route('login') }}" wire:navigate class="text-brand-green font-medium hover:underline">
                            Create one
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
