<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Purchases</h1>

    @php
    $purchases = [
        ['invoice_no'=>'INV001','project'=>'Gedung A','total'=>500000,'status'=>'Paid'],
        ['invoice_no'=>'INV002','project'=>'Gedung B','total'=>800000,'status'=>'Pending'],
    ];
    @endphp

    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Invoice</th>
                <th class="p-2">Project</th>
                <th class="p-2">Total</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $p)
            <tr class="border-b">
                <td class="p-2">{{ $p['invoice_no'] }}</td>
                <td class="p-2">{{ $p['project'] }}</td>
                <td class="p-2">${{ number_format($p['total']) }}</td>
                <td class="p-2">{{ $p['status'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
