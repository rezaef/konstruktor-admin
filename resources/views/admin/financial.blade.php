<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Financial Summary</h1>

    @php
    $financials = [
        ['project'=>'Gedung A','revenue'=>1000000,'cost'=>700000,'profit'=>300000],
        ['project'=>'Gedung B','revenue'=>1500000,'cost'=>1000000,'profit'=>500000],
    ];
    @endphp

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
</x-app-layout>
