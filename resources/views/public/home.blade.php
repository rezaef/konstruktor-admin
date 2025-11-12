<x-guest-layout>
  <!-- Header / Nav -->
  <header class="sticky top-0 z-40 w-full bg-white/90 backdrop-blur border-b">
    <div class="mx-auto max-w-screen-xl px-8 h-16 flex items-center justify-between">
      <a href="/" class="inline-flex items-center gap-3">
        <img src="{{ asset('images/hda-logo.svg') }}" alt="HDA Interior" class="h-8 w-auto"/>
        <span class="font-semibold tracking-tight text-gray-800">HDA Interior</span>
      </a>
      <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
        <a href="#about" class="text-gray-700 hover:text-teal-700">About</a>
        <a href="#projects" class="text-gray-700 hover:text-teal-700">Projects</a>
        <a href="#services" class="text-gray-700 hover:text-teal-700">Services</a>
        <a href="{{ route('contact') }}" class="rounded-xl bg-teal-600 px-4 py-2 text-white hover:bg-teal-700">Contact</a>
      </nav>
    </div>
  </header>

  <!-- HERO -->
  <section class="relative w-full bg-center bg-cover" style="background-image:url('https://picsum.photos/1920/900?blur=1');">
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/60"></div>
    <div class="mx-auto max-w-screen-xl px-8">
      <div class="relative flex h-[520px] items-center text-white">
        <div class="max-w-3xl">
          <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-1 text-xs font-semibold ring-1 ring-white/20">Award‑Winning Interior Studio</span>
          <h1 class="mt-4 text-5xl font-bold leading-tight tracking-tight">Transform Your Space</h1>
          <p class="mt-4 text-lg opacity-90">Elevating homes and offices with timeless design and expert craftsmanship.</p>
          <div class="mt-8 flex flex-wrap gap-4">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-xl bg-orange-500 px-6 py-3 font-semibold text-white shadow hover:bg-orange-600">Get a Free Consult</a>
            <a href="#projects" class="inline-flex items-center justify-center rounded-xl border border-white/30 px-6 py-3 font-semibold text-white hover:bg-white/10">See Projects</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about" class="mx-auto max-w-screen-xl px-8 py-16">
    <div class="text-center">
      <h2 class="text-3xl font-bold">About HDA Interior</h2>
      <p class="mx-auto mt-3 max-w-3xl text-gray-700">HDA Interior specializes in creating beautiful and functional spaces that reflect your unique style.</p>
    </div>

    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="rounded-2xl border bg-white p-6 text-center shadow-sm">
        <div class="text-3xl font-bold text-teal-600">15+</div>
        <div class="mt-1 font-semibold">Years of Excellence</div>
      </div>
      <div class="rounded-2xl border bg-white p-6 text-center shadow-sm">
        <div class="text-3xl font-bold text-orange-500">200+</div>
        <div class="mt-1 font-semibold">Projects Completed</div>
      </div>
      <div class="rounded-2xl border bg-white p-6 text-center shadow-sm">
        <div class="text-3xl font-bold text-purple-600">150+</div>
        <div class="mt-1 font-semibold">Happy Clients</div>
      </div>
    </div>
  </section>

  <!-- FEATURED PROJECTS -->
  <section id="projects" class="w-full bg-gray-50">
    <div class="mx-auto max-w-screen-xl px-8 py-16">
      <div class="text-center">
        <h2 class="text-3xl font-bold">Featured Projects</h2>
        <p class="mt-2 text-gray-600">Explore our latest interior design masterpieces</p>
      </div>

      <div class="mt-10 grid grid-cols-1 md:grid-cols-4 gap-8">
        @for ($i = 1; $i <= 4; $i++)
          <article class="group overflow-hidden rounded-2xl border bg-white shadow-sm transition hover:shadow-md">
            <div class="relative h-48 w-full overflow-hidden">
              <img src="https://picsum.photos/seed/{{ $i }}/600/400" alt="Project {{$i}}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" />
              <span class="absolute left-3 top-3 rounded-full bg-black/60 px-3 py-1 text-xs text-white">Residential</span>
            </div>
            <div class="p-5">
              <h3 class="text-lg font-semibold">Project {{$i}}</h3>
              <p class="mt-2 line-clamp-2 text-sm text-gray-600">Short project description goes here.</p>
              <div class="mt-4">
                <a href="#" class="text-sm font-medium text-teal-700 hover:underline">View details →</a>
              </div>
            </div>
          </article>
        @endfor
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="services" class="mx-auto max-w-screen-xl px-8 py-16">
    <h2 class="text-center text-3xl font-bold">Our Services</h2>
    <div class="mt-10 grid grid-cols-1 md:grid-cols-4 gap-8">
      @foreach ([
        'Residential Design'=> 'Tailored home interiors balancing function and aesthetics.',
        'Office Design'     => 'Productive, modern workspaces for thriving teams.',
        'Renovation'        => 'Refresh or reimagine spaces without starting over.',
        'Consultation'      => 'Expert advice to clarify your vision and budget.',
      ] as $service => $desc)
        <div class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
          <h3 class="text-xl font-semibold">{{ $service }}</h3>
          <p class="mt-2 text-sm text-gray-600">{{ $desc }}</p>
          <a href="{{ route('contact') }}" class="mt-3 inline-block font-medium text-teal-700 hover:underline">Learn More</a>
        </div>
      @endforeach
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section class="w-full bg-gray-900 text-white">
    <div class="mx-auto max-w-screen-xl px-8 py-16">
      <h2 class="text-center text-3xl font-bold">Client Testimonials</h2>
      <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ([
          ['name'=>'Sarah Johnson','role'=>'Homeowner','text'=>'"HDA Interior transformed our house into a dream home."'],
          ['name'=>'Michael Chen','role'=>'Business Owner','text'=>'"Professional, efficient, and talented. Delivered on time."'],
          ['name'=>'Diana Putri','role'=>'Restaurant Owner','text'=>'"Warm, inviting atmosphere. Highly recommended!"']
        ] as $testimonial)
          <div class="rounded-2xl bg-gray-800 p-6 ring-1 ring-white/10">
            <p class="italic">{{ $testimonial['text'] }}</p>
            <div class="mt-4 font-semibold">{{ $testimonial['name'] }}</div>
            <div class="text-sm text-gray-300">{{ $testimonial['role'] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="w-full bg-gray-950 text-gray-300">
    <div class="mx-auto max-w-screen-xl px-8 py-14">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h3 class="font-bold">HDA Interior</h3>
          <p class="mt-2 text-sm">Creating beautiful, functional spaces that inspire and delight.</p>
        </div>
        <div>
          <h3 class="font-bold">Contact Us</h3>
          <ul class="mt-2 space-y-1 text-sm">
            <li>Pakal, Surabaya</li>
            <li>+62 817 0317 7030</li>
            <li>hda.interiordesign@gmail.com</li>
          </ul>
        </div>
        <div>
          <h3 class="font-bold">Follow Us</h3>
          <div class="mt-2 flex gap-3">
            <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-600 transition hover:bg-teal-500">F</a>
            <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full bg-orange-500 transition hover:bg-orange-400">I</a>
            <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full bg-purple-600 transition hover:bg-purple-500">L</a>
          </div>
        </div>
      </div>
      <div class="mt-10 border-t border-white/10 pt-6 text-center text-sm">&copy; {{ date('Y') }} HDA Interior. All rights reserved.</div>
    </div>
  </footer>
</x-guest-layout>
