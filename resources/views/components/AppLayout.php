<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col">
        <div class="p-4 font-bold text-xl border-b border-gray-700">
            Konstruktor Admin
        </div>
        <nav class="flex-1 mt-4">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('admin.projects') }}" class="block px-4 py-2 hover:bg-gray-700">Projects</a>
            <a href="{{ route('admin.purchases') }}" class="block px-4 py-2 hover:bg-gray-700">Purchases</a>
            <a href="{{ route('admin.assets') }}" class="block px-4 py-2 hover:bg-gray-700">Assets</a>
            <a href="{{ route('admin.financial') }}" class="block px-4 py-2 hover:bg-gray-700">Financial</a>
            <a href="{{ route('admin.export') }}" class="block px-4 py-2 hover:bg-gray-700">Export Jobs</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        {{ $slot }}
    </main>
</div>
