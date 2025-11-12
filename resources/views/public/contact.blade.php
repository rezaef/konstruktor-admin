<x-guest-layout>
    <!-- Hero -->
    <section class="relative w-full h-[280px] bg-center bg-cover" style="background-image:url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1400&q=80');">
        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-2">Hubungi Kami</h1>
                <p class="text-gray-200">Kami siap membantu proyek interior Anda</p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="w-full max-w-5xl mx-auto px-6 py-14 grid md:grid-cols-2 gap-10">
        <!-- Info kiri (tanpa x-icon) -->
        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-gray-800">Mari Bekerja Sama ✨</h2>
            <p class="text-gray-600">Isi formulir atau hubungi kami lewat kontak di bawah.</p>

            <div class="space-y-3 text-gray-700">
                <div class="flex items-center gap-3">
                    <!-- map-pin svg -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                    <span>Pakal, Surabaya, Indonesia</span>
                </div>
                <div class="flex items-center gap-3">
                    <!-- phone svg -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.008 6.492 14.5 14.5 14.5.86 0 1.694-.07 2.5-.206a2 2 0 001.63-1.972v-2.28a1 1 0 00-.883-.993l-3.89-.466a1 1 0 00-.94.43l-.97 1.36a1 1 0 01-1.22.34 11.5 11.5 0 01-5.38-5.38 1 1 0 01.34-1.22l1.36-.97a1 1 0 00.43-.94l-.466-3.89a1 1 0 00-.993-.883H4.43a2 2 0 00-1.972 1.63c-.137.806-.208 1.64-.208 2.5z"/>
                    </svg>
                    <span>+62 817 0317 7030</span>
                </div>
                <div class="flex items-center gap-3">
                    <!-- mail svg -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 7.5v9A2.25 2.25 0 0119.5 18.75H4.5A2.25 2.25 0 012.25 16.5v-9m19.5 0l-8.69 5.64a2.25 2.25 0 01-2.12 0L2.25 7.5m19.5 0L15.38 3.25M2.25 7.5 8.62 3.25"/>
                    </svg>
                    <span>hda.interiordesign@gmail.com</span>
                </div>
            </div>

            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mt-6 text-white bg-gray-800 hover:bg-gray-700 px-5 py-2.5 rounded-lg transition">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Form kanan (hanya HTML standar + Breeze button kalau ada) -->
        <div class="bg-white shadow-lg rounded-2xl p-8 border">
            <form method="POST" action="#" class="space-y-5">
                @csrf
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" required class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" placeholder="Nama Anda">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" placeholder="email@domain.com">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Pesan</label>
                    <textarea name="message" rows="5" required class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow transition">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </section>
</x-guest-layout>
