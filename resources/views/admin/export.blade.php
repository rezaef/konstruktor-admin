@extends('layouts.admin')

@section('title', 'Export')
@section('page_title', 'Export Reports')

@section('content')
<div class="rounded-xl bg-white dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-white/10 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Export History</h3>
        <a href="#" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">+ New Export</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 dark:bg-gray-900/30 text-gray-600 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">File Name</th>
                    <th class="px-4 py-2 text-left">Type</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-white/10 text-gray-800 dark:text-gray-200">
                @foreach ([
                    ['file'=>'purchases_nov.xlsx','type'=>'Excel','status'=>'Completed','date'=>'2025-11-13'],
                    ['file'=>'assets_report.pdf','type'=>'PDF','status'=>'Completed','date'=>'2025-11-10'],
                    ['file'=>'finance_q3.csv','type'=>'CSV','status'=>'Processing','date'=>'2025-11-12'],
                ] as $exp)
                <tr>
                    <td class="px-4 py-2 font-medium">{{ $exp['file'] }}</td>
                    <td class="px-4 py-2">{{ $exp['type'] }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-0.5 rounded-full text-xs
                            @if($exp['status'] === 'Completed') bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300
                            @else bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300 @endif">
                            {{ $exp['status'] }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($exp['date'])->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
