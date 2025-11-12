@extends('layouts.admin')

@section('title', 'Financial')
@section('page_title', 'Financial Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl ring-1 ring-gray-200 dark:ring-white/10">
        <p class="text-sm text-gray-500 dark:text-gray-400">Income</p>
        <h3 class="text-2xl font-semibold text-emerald-600 dark:text-emerald-400">Rp 125.500.000</h3>
    </div>
    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl ring-1 ring-gray-200 dark:ring-white/10">
        <p class="text-sm text-gray-500 dark:text-gray-400">Expense</p>
        <h3 class="text-2xl font-semibold text-rose-600 dark:text-rose-400">Rp 78.200.000</h3>
    </div>
    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl ring-1 ring-gray-200 dark:ring-white/10">
        <p class="text-sm text-gray-500 dark:text-gray-400">Net Profit</p>
        <h3 class="text-2xl font-semibold text-indigo-600 dark:text-indigo-400">Rp 47.300.000</h3>
    </div>
</div>

<div class="mt-6 rounded-xl bg-white dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-white/10 p-5">
    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Recent Transactions</h3>
    <ul class="divide-y divide-gray-100 dark:divide-white/10 text-sm">
        <li class="py-2 flex justify-between"><span>POS Sales (Store 01)</span><span class="text-emerald-500">+ Rp 18.200.000</span></li>
        <li class="py-2 flex justify-between"><span>Supplier Payment (PT Jaya)</span><span class="text-rose-500">- Rp 5.800.000</span></li>
        <li class="py-2 flex justify-between"><span>POS Sales (Store 02)</span><span class="text-emerald-500">+ Rp 11.700.000</span></li>
        <li class="py-2 flex justify-between"><span>Logistics Cost</span><span class="text-rose-500">- Rp 2.300.000</span></li>
    </ul>
</div>
@endsection
