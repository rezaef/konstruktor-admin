@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Admin Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
        @php
            $cards = [
                ['title'=>'Total Projects','value'=>24,'growth'=>'+3.4%'],
                ['title'=>'Assets','value'=>156,'growth'=>'+1.2%'],
                ['title'=>'Monthly Spend','value'=>'Rp 42.5jt','growth'=>'-2.1%'],
                ['title'=>'Open Purchase','value'=>9,'growth'=>'+1'],
            ];
        @endphp

        @foreach($cards as $c)
            <div class="p-4 rounded-xl bg-white dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-white/10">
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $c['title'] }}</p>
                <div class="flex items-end justify-between mt-2">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $c['value'] }}</h3>
                    <span class="text-xs px-2 py-0.5 rounded-full {{ str_starts_with($c['growth'], '-') ? 'bg-rose-50 text-rose-700 dark:bg-rose-900/30 dark:text-rose-300' : 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300' }}">{{ $c['growth'] }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6 grid grid-cols-1 xl:grid-cols-3 gap-4">
        {{-- Purchases --}}
        <div class="xl:col-span-2 bg-white dark:bg-gray-800 rounded-xl ring-1 ring-gray-200 dark:ring-white/10">
            <div class="flex items-center justify-between p-4 border-b border-gray-100 dark:border-white/10">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Recent Purchases</h3>
                <a href="{{ route('admin.purchases') }}" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-900/30 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-5 py-2 text-left">PO</th>
                            <th class="px-5 py-2 text-left">Vendor</th>
                            <th class="px-5 py-2 text-left">Amount</th>
                            <th class="px-5 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-white/10 text-gray-900 dark:text-gray-100">
                        <tr><td class="px-5 py-2">PO-24045</td><td>PT Sembako Jaya</td><td>Rp 8.500.000</td><td><span class="bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300 px-2 py-0.5 rounded-full text-xs">Paid</span></td></tr>
                        <tr><td class="px-5 py-2">PO-24046</td><td>CV Nusantara</td><td>Rp 2.150.000</td><td><span class="bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300 px-2 py-0.5 rounded-full text-xs">Pending</span></td></tr>
                        <tr><td class="px-5 py-2">PO-24048</td><td>UD Prima</td><td>Rp 1.275.000</td><td><span class="bg-rose-50 text-rose-700 dark:bg-rose-900/30 dark:text-rose-300 px-2 py-0.5 rounded-full text-xs">Overdue</span></td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Quick Stats --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl ring-1 ring-gray-200 dark:ring-white/10 p-4">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Top Assets</h3>
            <ul class="divide-y divide-gray-100 dark:divide-white/10 text-sm">
                <li class="py-2 flex justify-between"><span>Barcode Scanner ZD220</span><span class="text-gray-500 dark:text-gray-400">92%</span></li>
                <li class="py-2 flex justify-between"><span>Thermal Printer E58</span><span class="text-gray-500 dark:text-gray-400">81%</span></li>
                <li class="py-2 flex justify-between"><span>POS Terminal Kassa</span><span class="text-gray-500 dark:text-gray-400">77%</span></li>
            </ul>
        </div>
    </div>
@endsection
