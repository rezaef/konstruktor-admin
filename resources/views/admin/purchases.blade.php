@extends('layouts.admin')

@section('title', 'Purchases')
@section('page_title', 'Purchase Orders')

@section('content')
<div class="rounded-xl bg-white dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-white/10 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Purchase List</h3>
        <a href="#" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">+ New Purchase</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 dark:bg-gray-900/30 text-gray-600 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">PO</th>
                    <th class="px-4 py-2 text-left">Vendor</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-white/10 text-gray-800 dark:text-gray-200">
                @foreach ([
                    ['po'=>'PO-24045','vendor'=>'PT Sembako Jaya','total'=>'Rp 8.500.000','status'=>'Paid','date'=>'2025-11-10'],
                    ['po'=>'PO-24046','vendor'=>'CV Nusantara','total'=>'Rp 2.150.000','status'=>'Pending','date'=>'2025-11-11'],
                    ['po'=>'PO-24047','vendor'=>'PT Andalan','total'=>'Rp 5.320.000','status'=>'Paid','date'=>'2025-11-12'],
                ] as $row)
                <tr>
                    <td class="px-4 py-2 font-medium">{{ $row['po'] }}</td>
                    <td class="px-4 py-2">{{ $row['vendor'] }}</td>
                    <td class="px-4 py-2">{{ $row['total'] }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-0.5 rounded-full text-xs
                            @if($row['status'] === 'Paid') bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300
                            @elseif($row['status'] === 'Pending') bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300
                            @else bg-rose-50 text-rose-700 dark:bg-rose-900/30 dark:text-rose-300 @endif">
                            {{ $row['status'] }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($row['date'])->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
