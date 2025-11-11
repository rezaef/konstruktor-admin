<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Assets</h1>

    @php
    $assets = [
        ['code'=>'AST001','name'=>'Komputer','category'=>'Elektronik','qty'=>10,'location'=>'Gudang'],
        ['code'=>'AST002','name'=>'Meja','category'=>'Furniture','qty'=>5,'location'=>'Kantor'],
    ];
    @endphp

    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Code</th>
                <th class="p-2">Name</th>
                <th class="p-2">Category</th>
                <th class="p-2">Qty</th>
                <th class="p-2">Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $a)
            <tr class="border-b">
                <td class="p-2">{{ $a['code'] }}</td>
                <td class="p-2">{{ $a['name'] }}</td>
                <td class="p-2">{{ $a['category'] }}</td>
                <td class="p-2">{{ $a['qty'] }}</td>
                <td class="p-2">{{ $a['location'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
