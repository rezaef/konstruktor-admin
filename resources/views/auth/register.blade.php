@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="min-h-screen grid md:grid-cols-2">

    {{-- LEFT Branding Panel --}}
    <div class="hidden md:flex relative overflow-hidden bg-gradient-to-br from-teal-700 via-teal-600 to-teal-500">
        <div class="absolute inset-0 opacity-25"
            style="background-image:
                radial-gradient(ellipse at 20% 10%, white 0%, transparent 40%),
                radial-gradient(ellipse at 80% 60%, white 0%, transparent 45%);">
        </div>

        <div class="relative z-10 flex flex-col justify-between w-full p-12 text-white">

            {{-- Logo + Text --}}
            <div>
                <div class="flex items-center gap-3 mb-10">
                    <div class="h-12 w-12 rounded-2xl bg-white/15 backdrop-blur flex items-center justify-center">
                        <img src="{{ asset('images/logo-hda.jpeg') }}" alt="HDA Interior" class="h-10 w-auto">
                    </div>
                    <div>
                        <p class="text-2xl font-semibold leading-tight">HDA Interior</p>
                        <p class="text-sm text-white/80">Bergabung sekarang 🚀</p>
                    </div>
                </div>

                <h1 class="text-4xl font-bold leading-tight">
                    Buat akun baru & kelola dashboard
                </h1>
                <p class="mt-4 text-white/90 max-w-md">
                    Akses fitur admin, kelola data proyek, dan mulai bekerja lebih produktif.
                </p>
            </div>

            {{-- Benefits --}}
            {{-- <ul class="space-y-2 text-sm text-white/90 mt-10">
                <li class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
                    Registrasi cepat & aman
                </li>
                <li class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
                    Konfirmasi email (opsional)
                </li>
                <li class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
                    Full dark-mode support
                </li> --}}
            </ul>
        </div>
    </div>

    {{-- RIGHT Form Panel --}}
    <div class="flex items-center justify-center py-12 px-6 md:px-12 bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-md">

            {{-- Mobile branding --}}
            <div class="md:hidden mb-8 flex items-center gap-3">
                <div class="h-10 w-10 rounded-2xl bg-teal-600/10 flex items-center justify-center">
                    <img src="{{ asset('images/logo-hda.jpeg') }}" alt="HDA Interior" class="h-8 w-auto">
                </div>
                <div>
                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">HDA Interior</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Buat akun baru</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm ring-1 ring-black/5 dark:ring-white/10 rounded-2xl p-6 md:p-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                    Daftar Akun Baru
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Isi data berikut dengan benar.
                </p>

                <form method="POST" action="{{ route('register') }}" class="space-y-5 mt-6">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <x-input-label for="name" :value="__('Nama')" class="text-gray-800 dark:text-gray-200"/>
                        <x-text-input
                            id="name" name="name" type="text"
                            class="block mt-1 w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                            placeholder="Nama lengkap"
                            required autofocus autocomplete="name"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    {{-- Email --}}
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-800 dark:text-gray-200"/>
                        <x-text-input
                            id="email" name="email" type="email"
                            class="block mt-1 w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                            placeholder="you@example.com"
                            required autocomplete="email"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    {{-- Password --}}
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-gray-800 dark:text-gray-200"/>
                        <x-text-input
                            id="password" name="password" type="password"
                            class="block mt-1 w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                            placeholder="••••••••"
                            required autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            Minimal 8 karakter (kombinasi huruf, angka, simbol direkomendasikan).
                        </p>
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-800 dark:text-gray-200"/>
                        <x-text-input
                            id="password_confirmation" name="password_confirmation"
                            type="password"
                            class="block mt-1 w-full dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                            placeholder="••••••••"
                            required autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>

                    {{-- Terms (optional) --}}
                    @if (Route::has('terms.show') && Route::has('policy.show'))
                    <div class="flex items-start gap-2">
                        <input id="terms" name="terms" type="checkbox"
                            class="mt-1 rounded border-gray-300 text-teal-600 focus:ring-teal-500 dark:bg-gray-900 dark:border-gray-700"
                            required>
                        <label for="terms" class="text-sm text-gray-700 dark:text-gray-300">
                            Saya menyetujui
                            <a href="{{ route('terms.show') }}" class="underline text-teal-600 dark:text-teal-400">Ketentuan Layanan</a>
                            &
                            <a href="{{ route('policy.show') }}" class="underline text-teal-600 dark:text-teal-400">Kebijakan Privasi</a>
                        </label>
                    </div>
                    @endif

                    {{-- Submit --}}
                    <x-primary-button class="w-full justify-center bg-teal-600 hover:bg-teal-700">
                        Buat Akun
                    </x-primary-button>

                </form>
            </div>

            <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-medium text-teal-600 hover:text-teal-700 dark:text-teal-400 dark:hover:text-teal-300">
                    Masuk di sini
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
