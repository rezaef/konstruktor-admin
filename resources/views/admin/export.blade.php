<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Export Jobs</h1>

    @php
    $jobs = [
        ['user'=>'Admin1','job_name'=>'Export Projects','created_at'=>'2025-11-06','status'=>'Completed'],
        ['user'=>'Admin2','job_name'=>'Export Purchases','created_at'=>'2025-11-07','status'=>'Pending'],
    ];
    @endphp

    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">User</th>
                <th class="p-2">Job Name</th>
                <th class="p-2">Created At</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $j)
            <tr class="border-b">
                <td class="p-2">{{ $j['user'] }}</td>
                <td class="p-2">{{ $j['job_name'] }}</td>
                <td class="p-2">{{ $j['created_at'] }}</td>
                <td class="p-2">{{ $j['status'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
