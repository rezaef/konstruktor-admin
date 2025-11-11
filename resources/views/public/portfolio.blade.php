<x-guest-layout>
    <h2 class="text-3xl font-bold text-center mb-6">Portfolio Proyek</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
            $projects = [
                ['name'=>'Gedung A','desc'=>'Proyek konstruksi gedung A selesai tepat waktu','img'=>'https://via.placeholder.com/400x250'],
                ['name'=>'Gedung B','desc'=>'Proyek konstruksi gedung B dengan kualitas tinggi','img'=>'https://via.placeholder.com/400x250'],
                ['name'=>'Gedung C','desc'=>'Proyek konstruksi gedung C selesai dengan efisiensi','img'=>'https://via.placeholder.com/400x250'],
            ];
        @endphp

        @foreach($projects as $p)
            <div class="bg-white shadow rounded overflow-hidden">
                <img src="{{ $p['img'] }}" alt="{{ $p['name'] }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">{{ $p['name'] }}</h3>
                    <p class="text-gray-600">{{ $p['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
