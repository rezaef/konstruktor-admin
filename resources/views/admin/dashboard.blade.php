<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card: Projects -->
        <div class="bg-white shadow rounded p-4">
            <h2 class="font-bold text-xl mb-2">Projects</h2>
            <p class="text-gray-600">Jumlah project: 3</p>
        </div>

        <!-- Card: Purchases -->
        <div class="bg-white shadow rounded p-4">
            <h2 class="font-bold text-xl mb-2">Purchases</h2>
            <p class="text-gray-600">Jumlah pembelian: 5</p>
        </div>

        <!-- Card: Assets -->
        <div class="bg-white shadow rounded p-4">
            <h2 class="font-bold text-xl mb-2">Assets</h2>
            <p class="text-gray-600">Jumlah aset: 8</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Financial Summary (Dummy)</h2>
        <table class="min-w-full bg-white shadow rounded">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">Project</th>
                    <th class="p-2">Revenue</th>
                    <th class="p-2">Cost</th>
                    <th class="p-2">Profit</th>
                </tr>
            </thead>
            <tbody>
                @php
                $financials = [
                    ['project'=>'Gedung A','revenue'=>1000000,'cost'=>700000,'profit'=>300000],
                    ['project'=>'Gedung B','revenue'=>1500000,'cost'=>1000000,'profit'=>500000],
                ];
                @endphp
                @foreach($financials as $f)
                <tr class="border-b">
                    <td class="p-2">{{ $f['project'] }}</td>
                    <td class="p-2">${{ number_format($f['revenue']) }}</td>
                    <td class="p-2">${{ number_format($f['cost']) }}</td>
                    <td class="p-2">${{ number_format($f['profit']) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
