<x-guest-layout>
    <h2 class="text-3xl font-bold text-center mb-6">Hubungi Kami</h2>

    <form class="max-w-lg mx-auto bg-white shadow p-6 rounded space-y-4">
        <div>
            <x-input-label>Nama</x-input-label>
            <input type="text" name="name" class="w-full border rounded p-2" placeholder="Nama Anda">
        </div>
        <div>
            <x-input-label>Email</x-input-label>
            <input type="email" name="email" class="w-full border rounded p-2" placeholder="email@domain.com">
        </div>
        <div>
            <x-input-label>Pesan</x-input-label>
            <textarea name="message" class="w-full border rounded p-2" rows="5" placeholder="Tulis pesan Anda"></textarea>
        </div>
        <div class="text-right">
            <x-primary-button>Kirim pesan</x-primary-button>
        </div>
    </form>
</x-guest-layout>
