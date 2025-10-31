<section class="max-w-7xl mx-auto">
  <div class="mx-6 space-y-8">
    <div class="flex items-center justify-between">
      <div class="space-y-2">
        <div class="flex items-center gap-4">
          <div class="h-0.5 w-10 bg-blue-600"></div>
          <h1 class="font-semibold text-xl text-blue-600">Latest News & Updates</h1>
        </div>
        <h1 class="text-3xl font-semibold">We have the best programs for you</h1>
      </div>
      <button type="button"
        class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-900 px-5.5 py-3.5 tracking-wide transition-colors text-center cursor-pointer">
        <span class="relative z-10 transition-colors duration-300 group-hover:text-white">
          Explore All
        </span>
        <i data-lucide="move-right" stroke-width="1.5"
          class="relative z-10 transition-colors duration-300 group-hover:text-white"></i>
        <span
          class="absolute left-0 top-0 h-full w-0 bg-slate-900 transition-all duration-600 ease-out group-hover:w-full"></span>
      </button>
    </div>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
      <a href="" class="group border border-gray-300">
        <div class="h-56 overflow-hidden relative">
          <img src="{{ asset('images/collage/1.jpg') }}" alt=""
            class="size-full object-cover transform transition duration-800 ease-in-out group-hover:scale-125 group-hover:-rotate-2">
          <div class="absolute top-4 left-4 bg-blue-600 flex flex-col items-center">
            <h1 class="font-semibold text-2xl text-white p-2">12</h1>
            <p class="font-medium text-xs bg-white p-1">JAN, 2025</p>
          </div>
        </div>
        <div class="p-6 space-y-6">
          <div class="space-y-4">
            <h1 class="text-2xl font-semibold">Bachelor of Information Technology</h1>
            <p class="text-gray-600">Our team is ready for any challenge! We put our joint efforts to generate brave
              business ideas.</p>
          </div>
          <button type="button"
            class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-900 px-5.5 py-3.5 tracking-wide transition-colors text-center cursor-pointer">
            <span class="relative z-10 transition-colors duration-300 group-hover:text-white">
              Read More
            </span>
            <i data-lucide="move-right" stroke-width="1.5"
              class="relative z-10 transition-colors duration-300 group-hover:text-white"></i>
            <span
              class="absolute left-0 top-0 h-full w-0 bg-slate-900 transition-all duration-600 ease-out group-hover:w-full"></span>
          </button>
        </div>
      </a>
    </div>
  </div>
</section>