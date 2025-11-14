@extends('layouts.auth')

@section('title','Login')

@section('content')
<div class="min-h-screen grid md:grid-cols-2">

    {{-- Left Branding Panel --}}
    <div class="hidden md:flex relative overflow-hidden bg-gradient-to-br from-teal-700 via-teal-600 to-teal-500">
        <div class="absolute inset-0 opacity-25"
             style="background-image:
                radial-gradient(ellipse at 20% 10%, white 0%, transparent 40%),
                radial-gradient(ellipse at 80% 60%, white 0%, transparent 45%);">
        </div>

        <div class="relative z-10 flex flex-col justify-between w-full p-12 text-white">
            <div>
                <div class="flex items-center gap-3 mb-10">
                    <div class="h-12 w-12 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">
                        <img src="{{ asset('images/logo-hda.jpeg') }}" alt="HDA Interior" class="h-10 w-auto">
                    </div>
                    <div>
                        <p class="text-2xl font-semibold leading-tight">HDA Interior</p>
                        <p class="text-sm text-white/80">Admin Panel</p>
                    </div>
                </div>

                <h1 class="text-4xl font-bold leading-tight">
                    Masuk untuk kelola dashboard
                </h1>
                <p class="mt-4 text-white/90 max-w-md">
                    Akses fitur admin, pantau data, dan lanjutkan pekerjaan Anda.
                </p>
            </div>

            {{-- <ul class="space-y-2 text-sm text-white/90 mt-10">
                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Proteksi akun aman</li>
                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Antarmuka profesional</li>
                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Dark-mode friendly</li>
            </ul> --}}
        </div>
    </div>

    {{-- Right / Form Panel --}}
    <div class="flex items-center justify-center py-12 px-6 md:px-12 bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-md">

            {{-- Mobile brand --}}
            <div class="md:hidden mb-8 flex items-center gap-3">
                <div class="h-10 w-10 rounded-2xl bg-teal-600/10 flex items-center justify-center">
                    <img src="{{ asset('images/logo-hda.jpeg') }}" alt="HDA Interior" class="h-8 w-auto">
                </div>
                <div>
                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">HDA Interior</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Masuk untuk melanjutkan</p>
                </div>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="bg-white dark:bg-gray-800 shadow-sm ring-1 ring-black/5 dark:ring-white/10 rounded-2xl p-6 md:p-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Masuk</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Gunakan email dan kata sandi Anda.</p>

                <form method="POST" action="{{ route('login') }}" class="space-y-5 mt-6">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-800 dark:text-gray-200"/>
                        <x-text-input id="email" type="email" name="email"
                            class="block mt-1 w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                            placeholder="you@example.com"
                            required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div>
                        <div class="flex justify-between items-center">
                            <x-input-label for="password" :value="__('Password')" />
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-sm font-medium text-teal-600 hover:text-teal-700 dark:text-teal-400 dark:hover:text-teal-300">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                        <x-text-input id="password" type="password" name="password"
                            class="block mt-1 w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                            placeholder="••••••••"
                            required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center justify-between">
                        <label class="inline-flex items-center gap-2">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-teal-600 shadow-sm focus:ring-teal-500 dark:bg-gray-900 dark:border-gray-700">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Ingat saya</span>
                        </label>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                                Buat akun
                            </a>
                        @endif
                    </div>

                    {{-- Submit --}}
                    <x-primary-button class="w-full justify-center bg-teal-600 hover:bg-teal-700">
                        Masuk
                    </x-primary-button>

                </form>
            </div>

            <p class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
                Dengan masuk, Anda menyetujui Ketentuan Layanan & Kebijakan Privasi.
            </p>
        </div>
    </div>
</div>
@endsection
