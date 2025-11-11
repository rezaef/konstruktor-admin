<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Projects</h1>

    @php
    $projects = [
        ['code'=>'PRJ001','name'=>'Gedung A','budget'=>1000000,'start_date'=>'2025-11-01','end_date'=>'2025-12-31'],
        ['code'=>'PRJ002','name'=>'Gedung B','budget'=>1500000,'start_date'=>'2025-12-01','end_date'=>'2026-01-31'],
    ];
    @endphp

    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Code</th>
                <th class="p-2">Name</th>
                <th class="p-2">Budget</th>
                <th class="p-2">Start</th>
                <th class="p-2">End</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $p)
            <tr class="border-b">
                <td class="p-2">{{ $p['code'] }}</td>
                <td class="p-2">{{ $p['name'] }}</td>
                <td class="p-2">${{ number_format($p['budget']) }}</td>
                <td class="p-2">{{ $p['start_date'] }}</td>
                <td class="p-2">{{ $p['end_date'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
