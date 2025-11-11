<x-guest-layout>
    <!-- Hero Section -->
   <section class="w-full h-[500px] bg-cover bg-center relative" style="background-image: url('https://via.placeholder.com/1920x500');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="w-full max-w-6xl px-12 text-center text-white">
            <h1 class="text-5xl font-bold mb-4">Transform Your Space</h1>
            <p class="text-xl mb-6">Elevating homes and offices with timeless design and expert craftsmanship</p>
            <a href="{{ route('contact') }}" class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-3 px-6 rounded">Contact Us</a>
        </div>
    </div>
    </section>

    <!-- About Section -->
    <section class="w-full max-w-full py-16 px-12 text-center">
        <h2 class="text-3xl font-bold mb-4">About HDA Interior</h2>
        <p class="text-gray-700 max-w-4xl mx-auto mb-12">
            HDA Interior specializes in creating beautiful and functional spaces that reflect your unique style.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <div class="text-3xl text-teal-500 mb-2">15+</div>
                <div class="font-bold">Years of Excellence</div>
            </div>
            <div>
                <div class="text-3xl text-orange-400 mb-2">200+</div>
                <div class="font-bold">Projects Completed</div>
            </div>
            <div>
                <div class="text-3xl text-purple-500 mb-2">150+</div>
                <div class="font-bold">Happy Clients</div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    <section class="bg-gray-50 py-16 px-12">
        <h2 class="text-3xl font-bold text-center mb-6">Featured Projects</h2>
        <p class="text-gray-600 text-center mb-12">Explore our latest interior design masterpieces</p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @for($i=1; $i<=4; $i++)
            <div class="bg-white shadow-lg rounded overflow-hidden">
                <img src="https://via.placeholder.com/400x250" class="w-full h-48 object-cover" alt="Project {{$i}}">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-1">Project {{$i}}</h3>
                    <span class="text-sm text-gray-500">Residential</span>
                    <p class="text-gray-600 mt-2 text-sm">Short project description goes here.</p>
                </div>
            </div>
            @endfor
        </div>
    </section>

    <!-- Services Section -->
    <section class="w-full max-w-full py-16 px-12 text-center">
        <h2 class="text-3xl font-bold mb-8">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach(['Residential Design','Office Design','Renovation','Consultation'] as $service)
            <div class="bg-white shadow rounded p-6">
                <h3 class="font-bold text-xl mb-2">{{ $service }}</h3>
                <p class="text-gray-600 text-sm">Expert solutions tailored to your needs</p>
                <a href="{{ route('contact') }}" class="text-teal-500 mt-2 inline-block">Learn More</a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-gray-800 text-white py-16 px-12">
        <h2 class="text-3xl font-bold text-center mb-12">Client Testimonials</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['name'=>'Sarah Johnson','role'=>'Homeowner','text'=>'"HDA Interior transformed our house into a dream home."'],
                ['name'=>'Michael Chen','role'=>'Business Owner','text'=>'"Professional, efficient, and talented. Delivered on time."'],
                ['name'=>'Diana Putri','role'=>'Restaurant Owner','text'=>'"Warm, inviting atmosphere. Highly recommended!"']
            ] as $testimonial)
            <div class="bg-gray-700 rounded p-6 text-left">
                <p class="italic mb-4">{{ $testimonial['text'] }}</p>
                <div class="font-bold">{{ $testimonial['name'] }}</div>
                <div class="text-gray-300 text-sm">{{ $testimonial['role'] }}</div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full bg-gray-900 text-gray-300 py-12 px-12 mt-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h3 class="font-bold mb-2">HDA Interior</h3>
                <p>Creating beautiful, functional spaces that inspire and delight.</p>
            </div>
            <div>
                <h3 class="font-bold mb-2">Contact Us</h3>
                <p>Pakal, Surabaya</p>
                <p>+62 817 0317 7030</p>
                <p>hda.interiordesign@gmail.com</p>
            </div>
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
</x-guest-layout>
