<x-guest-layout>
    <div class="min-h-screen grid md:grid-cols-2">
        {{-- Left / Branding Panel --}}
        <div class="hidden md:flex relative overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-500 to-indigo-400">
            <div class="absolute inset-0 opacity-20"
                 style="background-image: radial-gradient(ellipse at 20% 10%, white 0%, transparent 40%),
                          radial-gradient(ellipse at 80% 60%, white 0%, transparent 45%);">
            </div>

            <div class="relative z-10 flex flex-col justify-between w-full p-12 text-white">
                <div>
                    <div class="flex items-center gap-3 mb-10">
                        <div class="h-12 w-12 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center font-semibold">
                            UI
                        </div>
                        <div>
                            <p class="text-2xl font-semibold leading-tight">Your App</p>
                            <p class="text-sm text-white/80">Bergabung sekarang 🚀</p>
                        </div>
                    </div>

                    <h1 class="text-4xl font-bold leading-tight">
                        Buat akun dan mulai kelola data
                    </h1>
                    <p class="mt-4 text-white/90 max-w-md">
                        Akses cepat ke dashboard, role-based access, dan fitur admin yang kamu butuhkan.
                    </p>
                </div>

                <div class="mt-10">
                    <ul class="space-y-2 text-sm text-white/90">
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Registrasi cepat & aman</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Konfirmasi email (opsional)</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Dark-mode friendly</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Right / Form Panel --}}
        <div class="flex items-center justify-center py-12 px-6 md:px-12 bg-gray-50 dark:bg-gray-900">
            <div class="w-full max-w-md">
                {{-- Small brand on mobile --}}
                <div class="md:hidden mb-8 flex items-center gap-3">
                    <div class="h-10 w-10 rounded-2xl bg-indigo-600/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-semibold">
                        UI
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">Your App</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Buat akun baru</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-sm ring-1 ring-black/5 dark:ring-white/10 rounded-2xl p-6 md:p-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">
                            Daftar
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Isi data di bawah ini untuk membuat akun.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input
                                id="name"
                                name="name"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('name')"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Nama lengkap"
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        {{-- Email --}}
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input
                                id="email"
                                name="email"
                                type="email"
                                class="block mt-1 w-full"
                                :value="old('email')"
                                required
                                autocomplete="username"
                                placeholder="you@example.com"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Password --}}
                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="block mt-1 w-full"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Minimal 8 karakter. Disarankan kombinasi huruf besar, kecil, angka, dan simbol.
                            </p>
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                            <x-text-input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                class="block mt-1 w-full"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                            />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        {{-- Optional: Terms (aktifkan jika kamu punya halaman terms/privacy) --}}
                        @if (Route::has('terms.show') && Route::has('policy.show'))
                            <div class="flex items-start gap-2">
                                <input id="terms" name="terms" type="checkbox"
                                       class="mt-1 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-700" required>
                                <label for="terms" class="text-sm text-gray-700 dark:text-gray-300">
                                    Saya menyetujui <a href="{{ route('terms.show') }}" class="underline hover:no-underline">Ketentuan Layanan</a>
                                    dan <a href="{{ route('policy.show') }}" class="underline hover:no-underline">Kebijakan Privasi</a>.
                                </label>
                            </div>
                        @endif

                        {{-- Submit --}}
                        <div class="pt-2">
                            <x-primary-button class="w-full justify-center">
                                {{ __('Buat Akun') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                    Sudah punya akun?
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300">Masuk di sini</a>
                    @endif
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
