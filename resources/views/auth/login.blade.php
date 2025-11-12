<x-guest-layout>
    <div class="min-h-screen grid md:grid-cols-2">
        {{-- Left / Branding Panel (visible on md+) --}}
        <div class="hidden md:flex relative overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-500 to-indigo-400">
            <div class="absolute inset-0 opacity-20"
                 style="background-image: radial-gradient(ellipse at 20% 10%, white 0%, transparent 40%),
                          radial-gradient(ellipse at 80% 60%, white 0%, transparent 45%);">
            </div>

            <div class="relative z-10 flex flex-col justify-between w-full p-12 text-white">
                <div>
                    {{-- Logo / Brand (opsional: ganti source sesuai asetmu) --}}
                    <div class="flex items-center gap-3 mb-10">
                        <div class="h-12 w-12 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center font-semibold">
                            UI
                        </div>
                        <div>
                            <p class="text-2xl font-semibold leading-tight">Your App</p>
                            <p class="text-sm text-white/80">Welcome back 👋</p>
                        </div>
                    </div>

                    <h1 class="text-4xl font-bold leading-tight">
                        Masuk untuk kelola <span class="whitespace-nowrap">dashboard-mu</span>
                    </h1>
                    <p class="mt-4 text-white/90 max-w-md">
                        Akses fitur admin, pantau data, dan lanjutkan pekerjaanmu tanpa hambatan.
                    </p>
                </div>

                <div class="mt-10">
                    <ul class="space-y-2 text-sm text-white/90">
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Keamanan akun dengan sesi aman</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> UI bersih & fokus untuk produktivitas</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Dark-mode friendly (ikut preferensi OS)</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Right / Form Panel --}}
        <div class="flex items-center justify-center py-12 px-6 md:px-12 bg-gray-50 dark:bg-gray-900">
            <div class="w-full max-w-md">
                {{-- Optional small brand on mobile --}}
                <div class="md:hidden mb-8 flex items-center gap-3">
                    <div class="h-10 w-10 rounded-2xl bg-indigo-600/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-semibold">
                        UI
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">Your App</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Masuk untuk melanjutkan</p>
                    </div>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="bg-white dark:bg-gray-800 shadow-sm ring-1 ring-black/5 dark:ring-white/10 rounded-2xl p-6 md:p-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">
                            Masuk
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Gunakan email dan kata sandi akunmu.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input
                                id="email"
                                type="email"
                                name="email"
                                class="block mt-1 w-full"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="you@example.com"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <div class="flex items-center justify-between">
                                <x-input-label for="password" :value="__('Password')" />
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="text-sm font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300 focus:outline-none focus:underline">
                                        {{ __('Lupa password?') }}
                                    </a>
                                @endif
                            </div>

                            <x-text-input
                                id="password"
                                type="password"
                                name="password"
                                class="block mt-1 w-full"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center gap-2 select-none">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-700" name="remember">
                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ __('Ingat saya') }}</span>
                            </label>

                            {{-- Optional: quick link to register (tampilkan jika route ada) --}}
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                                    {{ __('Buat akun') }}
                                </a>
                            @endif
                        </div>

                        <!-- Submit -->
                        <div class="pt-2">
                            <x-primary-button class="w-full justify-center">
                                {{ __('Masuk') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <p class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
                    Dengan masuk, kamu menyetujui Ketentuan Layanan & Kebijakan Privasi.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
