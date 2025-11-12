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
                            <p class="text-sm text-white/80">Verifikasi email</p>
                        </div>
                    </div>
                    <h1 class="text-4xl font-bold leading-tight">Cek kotak masukmu</h1>
                    <p class="mt-4 text-white/90 max-w-md">Kami telah mengirim tautan verifikasi. Tidak menerima? Kirim ulang dari sini.</p>
                </div>
                <p class="text-sm text-white/80 mt-10">Pastikan juga cek folder spam/promotions.</p>
            </div>
        </div>

        {{-- Right --}}
        <div class="flex items-center justify-center py-12 px-6 md:px-12 bg-gray-50 dark:bg-gray-900">
            <div class="w-full max-w-md">
                <div class="bg-white dark:bg-gray-800 shadow-sm ring-1 ring-black/5 dark:ring-white/10 rounded-2xl p-6 md:p-8">
                    <h2 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100 mb-2">
                        Verifikasi Email Diperlukan
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Sebelum mengakses aplikasi, verifikasi alamat emailmu melalui tautan yang telah kami kirim.
                    </p>

                    <!-- Status -->
                    <x-auth-session-status class="mt-4" :status="session('status')" />

                    <div class="mt-6 space-y-3">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <x-primary-button class="w-full justify-center">
                                {{ __('Kirim Ulang Email Verifikasi') }}
                            </x-primary-button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center rounded-md px-4 py-2 text-sm font-medium ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
                                {{ __('Keluar') }}
                            </button>
                        </form>
                    </div>
                </div>

                <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                    Salah email? <a href="{{ route('profile.show') }}" class="underline">Ubah dari profil setelah masuk.</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
