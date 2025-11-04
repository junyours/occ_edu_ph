<section class="max-w-7xl mx-auto">
  <div class="mx-6 space-y-8">
    <div class="flex items-center justify-between">
      <div class="space-y-2">
        <div class="flex items-center gap-4">
          <div class="h-0.5 w-10 bg-blue-600"></div>
          <h1 class="font-semibold text-xl text-blue-600">ACADEMIC PROGRAMS</h1>
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
      <div class="border border-gray-300 p-6 space-y-6">
        <div class="relative group h-46 overflow-hidden">
          <img src="{{ asset('images/collage/2.jpg') }}" alt=""
            class="size-full object-cover transform transition duration-800 ease-in-out group-hover:scale-125 group-hover:-rotate-2">
          <img src="{{ asset('images/departments/CIT.png') }}" alt="cit"
            class="size-16 object-contain absolute top-4 right-4">
        </div>
        <div class="space-y-4">
          <div class="space-y-2">
            <h1 class="text-2xl font-semibold">Bachelor of Science in Information Technology</h1>
            <h2 class="font-medium">College of Information Technology</h2>
          </div>
          <p class="text-gray-600 line-clamp-4">A comprehensive program designed to equip students with advanced
            technical skills in
            software development, systems analysis, cybersecurity, and emerging technologies such as artificial
            intelligence and cloud computing. This course prepares future IT professionals to become innovative
            problem-solvers and leaders in the digital industry.</p>
        </div>
        <div class="border-b border-gray-300"></div>
        <div class="flex justify-end">
          <div class="flex items-center gap-2">
            <i data-lucide="clock" class="text-blue-600" stroke-width="1.5"></i>
            <h1>04 Years</h1>
          </div>
        </div>
        <button type="button"
          class="group w-full relative inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-900 px-5.5 py-3.5 tracking-wide transition-colors text-center cursor-pointer">
          <span class="relative z-10 transition-colors duration-300 group-hover:text-white">
            Discover
          </span>
          <i data-lucide="move-right" stroke-width="1.5"
            class="relative z-10 transition-colors duration-300 group-hover:text-white"></i>
          <span
            class="absolute left-0 top-0 h-full w-0 bg-slate-900 transition-all duration-600 ease-out group-hover:w-full"></span>
        </button>
      </div>
    </div>
  </div>
</section>