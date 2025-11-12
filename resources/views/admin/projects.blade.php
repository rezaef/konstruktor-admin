@extends('layouts.admin')

@section('title', 'Projects')
@section('page_title', 'Project Management')

@section('content')
<div class="rounded-xl bg-white dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-white/10 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Active Projects</h3>
        <a href="#" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">+ New Project</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 dark:bg-gray-900/30 text-gray-600 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left font-medium">Name</th>
                    <th class="px-4 py-2 text-left font-medium">Client</th>
                    <th class="px-4 py-2 text-left font-medium">Progress</th>
                    <th class="px-4 py-2 text-left font-medium">Status</th>
                    <th class="px-4 py-2 text-left font-medium">Deadline</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-white/10 text-gray-800 dark:text-gray-200">
                @foreach ([
                    ['name'=>'Mini POS Rollout','client'=>'UD Prima','progress'=>80,'status'=>'In Progress','deadline'=>'2025-12-01'],
                    ['name'=>'Warehouse System','client'=>'PT Sembako Jaya','progress'=>100,'status'=>'Completed','deadline'=>'2025-10-20'],
                    ['name'=>'Financial Sync','client'=>'CV Nusantara','progress'=>60,'status'=>'Ongoing','deadline'=>'2025-11-25'],
                ] as $p)
                <tr>
                    <td class="px-4 py-2 font-medium">{{ $p['name'] }}</td>
                    <td class="px-4 py-2">{{ $p['client'] }}</td>
                    <td class="px-4 py-2 w-48">
                        <div class="h-2 rounded bg-gray-100 dark:bg-gray-700 overflow-hidden">
                            <div class="h-2 bg-indigo-500 dark:bg-indigo-400" style="width: {{ $p['progress'] }}%"></div>
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 text-right mt-1">{{ $p['progress'] }}%</div>
                    </td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-0.5 rounded-full text-xs
                            @if($p['status'] === 'Completed') bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300
                            @elseif($p['status'] === 'In Progress') bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-300
                            @else bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300 @endif">
                            {{ $p['status'] }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($p['deadline'])->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
