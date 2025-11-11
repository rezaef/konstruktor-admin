<div class="w-full min-h-screen flex flex-col bg-gray-100">
    <!-- Header full-width -->
    <header class="w-full bg-white shadow">
        <div class="w-full flex flex-col bg-gray-100">
            <!-- Logo -->
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>

            <!-- Navigation -->
            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">Home</a>
                <a href="{{ route('portfolio') }}" class="text-gray-700 hover:text-gray-900">Portfolio</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-gray-900">Contact</a>
                <a href="{{ route('login') }}" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500">Admin Login</a>
            </nav>
        </div>
    </header>

    <!-- Main content full-width -->
    <main class="w-full max-w-full px-6 md:px-12 py-12">
        {{ $slot }}
    </main>

    <!-- Footer full-width -->
    <footer class="w-full bg-gray-900 text-gray-300 py-12 mt-auto">
        <div class="w-full max-w-full grid grid-cols-1 md:grid-cols-3 gap-6 px-6 md:px-12">
            <!-- Company Info -->
            <div>
                <h3 class="font-bold mb-2">HDA Interior</h3>
                <p>Creating beautiful, functional spaces that inspire and delight. Your vision, our expertise.</p>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="font-bold mb-2">Contact Us</h3>
                <p>Pakal, Surabaya</p>
                <p>+62 817 0317 7030</p>
                <p>hda.interiordesign@gmail.com</p>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="font-bold mb-2">Follow Us</h3>
                <div class="flex space-x-3">
                    <a href="#" class="bg-teal-500 hover:bg-teal-600 w-8 h-8 flex items-center justify-center rounded-full">F</a>
                    <a href="#" class="bg-orange-400 hover:bg-orange-500 w-8 h-8 flex items-center justify-center rounded-full">I</a>
                    <a href="#" class="bg-purple-500 hover:bg-purple-600 w-8 h-8 flex items-center justify-center rounded-full">L</a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            &copy; {{ date('Y') }} HDA Interior. All rights reserved.
        </div>
    </footer>
</div>
