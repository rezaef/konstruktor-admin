@extends('layouts.admin')

@section('title', 'Assets')
@section('page_title', 'Asset Inventory')

@section('content')
<div class="rounded-xl bg-white dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-white/10 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Registered Assets</h3>
        <a href="#" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">+ Add Asset</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 dark:bg-gray-900/30 text-gray-600 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left">Code</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Location</th>
                    <th class="px-4 py-2 text-left">Condition</th>
                    <th class="px-4 py-2 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-white/10 text-gray-800 dark:text-gray-200">
                @foreach ([
                    ['code'=>'AST-0031','name'=>'Barcode Scanner ZD220','location'=>'Store 01','condition'=>'Excellent','status'=>'Active'],
                    ['code'=>'AST-0022','name'=>'Thermal Printer E58','location'=>'Store 02','condition'=>'Good','status'=>'Active'],
                    ['code'=>'AST-0009','name'=>'Cash Drawer CDX','location'=>'Warehouse','condition'=>'Fair','status'=>'Maintenance'],
                ] as $a)
                <tr>
                    <td class="px-4 py-2 font-medium">{{ $a['code'] }}</td>
                    <td class="px-4 py-2">{{ $a['name'] }}</td>
                    <td class="px-4 py-2">{{ $a['location'] }}</td>
                    <td class="px-4 py-2">{{ $a['condition'] }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-0.5 rounded-full text-xs
                            @if($a['status'] === 'Active') bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300
                            @else bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300 @endif">
                            {{ $a['status'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
