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
                            <p class="text-sm text-white/80">Konfirmasi ulang</p>
                        </div>
                    </div>
                    <h1 class="text-4xl font-bold leading-tight">Konfirmasi password</h1>
                    <p class="mt-4 text-white/90 max-w-md">Demi keamanan, masukkan kembali kata sandimu untuk melanjutkan.</p>
                </div>
            </div>
        </div>

        {{-- Right --}}
        <div class="flex items-center justify-center py-12 px-6 md:px-12 bg-gray-50 dark:bg-gray-900">
            <div class="w-full max-w-md">
                <div class="bg-white dark:bg-gray-800 shadow-sm ring-1 ring-black/5 dark:ring-white/10 rounded-2xl p-6 md:p-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">Konfirmasi Password</h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Masukkan password akunmu.</p>
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
                        @csrf

                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" type="password" name="password" class="block mt-1 w-full"
                                required autocomplete="current-password" placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <x-primary-button class="w-full justify-center">
                            {{ __('Konfirmasi') }}
                        </x-primary-button>
                    </form>
                </div>

                <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                    Lupa password? <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300">Reset di sini</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
