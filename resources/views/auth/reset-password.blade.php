<x-guest-layout>
    <div class="min-h-screen grid md:grid-cols-2">
        {{-- Left --}}
        <div class="hidden md:flex relative overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-500 to-indigo-400">
            <div class="absolute inset-0 opacity-20"
                 style="background-image: radial-gradient(ellipse at 20% 10%, white 0%, transparent 40%),
                          radial-gradient(ellipse at 80% 60%, white 0%, transparent 45%);"></div>
            <div class="relative z-10 w-full p-12 text-white flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-10">
                        <div class="h-12 w-12 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center font-semibold">UI</div>
                        <div>
                            <p class="text-2xl font-semibold leading-tight">Your App</p>
                            <p class="text-sm text-white/80">Setel ulang kata sandi</p>
                        </div>
                    </div>
                    <h1 class="text-4xl font-bold leading-tight">Buat password baru</h1>
                    <p class="mt-4 text-white/90 max-w-md">Gunakan kata sandi yang kuat agar akunmu tetap aman.</p>
                </div>
                <ul class="space-y-2 text-sm text-white/90 mt-10">
                    <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Minimal 8 karakter</li>
                    <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-white/70"></span> Gabungkan huruf, angka, simbol</li>
                </ul>
            </div>
        </div>

        {{-- Right --}}
        <div class="flex items-center justify-center py-12 px-6 md:px-12 bg-gray-50 dark:bg-gray-900">
            <div class="w-full max-w-md">
                <div class="bg-white dark:bg-gray-800 shadow-sm ring-1 ring-black/5 dark:ring-white/10 rounded-2xl p-6 md:p-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">Reset Password</h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Masukkan password barumu.</p>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                        @csrf
                        <!-- Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" type="email" name="email" class="block mt-1 w-full"
                                :value="old('email', $request->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password Baru')" />
                            <x-text-input id="password" type="password" name="password" class="block mt-1 w-full"
                                required autocomplete="new-password" placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm -->
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                            <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                                class="block mt-1 w-full" required autocomplete="new-password" placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <x-primary-button class="w-full justify-center">
                            {{ __('Simpan Password Baru') }}
                        </x-primary-button>
                    </form>
                </div>

                <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                    Ingat password? <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300">Masuk</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
