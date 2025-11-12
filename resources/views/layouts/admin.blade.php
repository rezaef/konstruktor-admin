{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" x-data="{}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen grid grid-cols-12">

        {{-- SIDEBAR --}}
        <aside class="hidden md:flex md:col-span-2 lg:col-span-2 xl:col-span-2 bg-white dark:bg-gray-900/60 border-r border-gray-200 dark:border-white/10">
            <div class="flex flex-col w-full">
                <div class="h-16 px-5 flex items-center gap-3 border-b border-gray-200/70 dark:border-white/10">
                    <div class="h-10 w-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-semibold">AD</div>
                    <div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Admin Panel</div>
                        <div class="text-base font-semibold text-gray-900 dark:text-white">Your App</div>
                    </div>
                </div>

                <nav class="p-3 space-y-1 text-sm">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white/90 dark:hover:bg-gray-800/60' }}">
                        📊 <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.projects') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.projects') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white/90 dark:hover:bg-gray-800/60' }}">
                        📁 <span>Projects</span>
                    </a>
                    <a href="{{ route('admin.assets') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.assets') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white/90 dark:hover:bg-gray-800/60' }}">
                        💼 <span>Assets</span>
                    </a>
                    <a href="{{ route('admin.purchases') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.purchases') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white/90 dark:hover:bg-gray-800/60' }}">
                        🧾 <span>Purchases</span>
                    </a>
                    <a href="{{ route('admin.financial') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.financial') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white/90 dark:hover:bg-gray-800/60' }}">
                        💰 <span>Financial</span>
                    </a>
                    <a href="{{ route('admin.export') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.export') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white/90 dark:hover:bg-gray-800/60' }}">
                        ⬇️ <span>Export</span>
                    </a>
                </nav>

                <div class="mt-auto p-3 text-xs text-gray-500 dark:text-gray-400 border-t border-gray-100 dark:border-white/10">
                    © {{ date('Y') }} Your App.
                </div>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="col-span-12 md:col-span-10 flex flex-col">
            {{-- TOPBAR --}}
            <header class="h-16 bg-white/80 dark:bg-gray-900/80 backdrop-blur border-b border-gray-200 dark:border-white/10 flex items-center justify-between px-4 md:px-6">
                <h1 class="text-lg font-semibold text-gray-900 dark:text-white">@yield('page_title', 'Dashboard')</h1>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600 dark:text-gray-300">{{ Auth::user()->name ?? 'Admin' }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="px-3 py-1.5 text-xs rounded-md bg-indigo-600 text-white hover:bg-indigo-700">Logout</button>
                    </form>
                </div>
            </header>

            {{-- PAGE CONTENT --}}
            <section class="flex-1 p-4 md:p-6">
                @yield('content')
            </section>
        </main>
    </div>
</body>
</html>
