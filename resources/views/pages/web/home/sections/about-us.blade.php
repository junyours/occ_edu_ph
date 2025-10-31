<section class="max-w-7xl mx-auto">
  <div class="mx-6 grid md:grid-cols-2 gap-8 items-center">
    <div class="hidden grid-cols-2 gap-4 md:grid">
      <div class="col-span-1 row-span-2">
        <img src="{{ asset('images/collage/1.jpg') }}" alt="collage-1" class="w-full h-full object-cover">
      </div>
      <div>
        <img src="{{ asset('images/collage/2.jpg') }}" alt="collage-2" class="w-full h-48 object-cover">
      </div>
      <div>
        <img src="{{ asset('images/collage/3.jpg') }}" alt="collage-3" class="w-full h-48 object-cover">
      </div>
    </div>
    <div class="space-y-2">
      <div class="flex items-center gap-4">
        <div class="h-0.5 w-10 bg-blue-600"></div>
        <h1 class="font-semibold text-xl text-blue-600">ABOUT US</h1>
      </div>
      <div class="space-y-4">
        <h1 class="text-3xl font-semibold">We Offer best program for Shaping the best Future</h1>
        <p>We are committed to leaving the world a better place. We pursue new technology, encourage creativity, engage
          with our communities, and share an entrepreneurial mindset.</p>
        <div class="flex items-center gap-4">
          <div class="px-6 py-4 border border-gray-300">
            <img src="{{ asset('images/icons/ab-users.svg') }}" alt="ab-users" class="size-10 object-contain">
          </div>
          <div class="space-y-1">
            <h1 class="font-semibold text-xl">Three MBA degrees</h1>
            <p class="text-gray-600 text-sm">Our team is ready for any challenge! We put our joint efforts to generate
              brave
              business ideas.</p>
          </div>
        </div>
        <div class="flex items-center gap-4">
          <div class="px-6 py-4 border border-gray-300">
            <img src="{{ asset('images/icons/ab-certificate.svg') }}" alt="ab-certificate"
              class="size-10 object-contain">
          </div>
          <div class="space-y-1">
            <h1 class="font-semibold text-xl">Choose From 98+ Degrees</h1>
            <p class="text-gray-600 text-sm">Our team is ready for any challenge! We put our joint efforts to generate
              brave
              business ideas.</p>
          </div>
        </div>
        <button type="button"
          class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap bg-blue-700 px-5.5 py-3.5 tracking-wide transition-colors text-center text-white cursor-pointer">
          <span class="relative z-10">
            Learn More
          </span>
          <i data-lucide="move-right" stroke-width="1.5" class="relative z-10"></i>
          <span
            class="absolute left-0 top-0 h-full w-0 bg-slate-900 transition-all duration-600 ease-out group-hover:w-full"></span>
        </button>
      </div>
    </div>
  </div>
</section>