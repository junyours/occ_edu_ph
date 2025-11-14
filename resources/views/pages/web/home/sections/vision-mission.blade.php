<section class="max-w-6xl mx-auto">
  <div class="mx-4 md:mx-6 space-y-4 md:space-y-8">
    <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown = false"
      class="md:h-80 flex shadow-2xl border border-slate-100 overflow-hidden transform transition duration-800 ease-out max-md:flex-col"
      :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-4 md:-translate-x-20'">
      <div class="group relative flex-1 overflow-hidden">
        <img src="{{ asset('images/others/1.jpg') }}"
          class="md:size-full max-md:h-40 max-md:w-full object-cover transform transition duration-800 ease-in-out group-hover:scale-125 group-hover:-rotate-2">
        <div class="absolute inset-0 bg-blue-700/30 flex items-center justify-center">
          <h1 class="font-semibold text-3xl text-white">Our Vision</h1>
        </div>
      </div>
      <div class="flex-1 flex flex-col justify-center gap-8 p-6">
        <div class="h-0.5 w-10 bg-blue-700"></div>
        <p class="font-medium text-gray-600">Opol Community College envisions to be an advanced institution through
          digital
          innovation,
          empowering leaders, and shaping entrepreneurs.</p>
      </div>
    </div>
    <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown = false"
      class="md:h-80 flex shadow-2xl border border-slate-100 overflow-hidden transform transition duration-800 ease-out max-md:flex-col-reverse"
      :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-4 md:translate-x-20'">
      <div class="flex-1 flex flex-col justify-center gap-8 p-6">
        <div class="h-0.5 w-10 bg-blue-700"></div>
        <p class="font-medium text-gray-600">Opol Community College is dedicated to producing competitive graduates
          through
          advanced
          pedagogies, research, and innovation.</p>
      </div>
      <div class="group relative flex-1 overflow-hidden">
        <img src="{{ asset('images/others/2.jpg') }}"
          class="md:size-full max-md:h-40 max-md:w-full object-cover transform transition duration-800 ease-in-out group-hover:scale-125 group-hover:-rotate-2">
        <div class="absolute inset-0 bg-blue-700/30 flex items-center justify-center">
          <h1 class="font-semibold text-3xl text-white">Our Mission</h1>
        </div>
      </div>
    </div>
    <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown = false"
      class="md:h-80 flex shadow-2xl border border-slate-100 overflow-hidden transform transition duration-800 ease-out max-md:flex-col"
      :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-4 md:-translate-x-20'">
      <div class="group relative flex-1 overflow-hidden">
        <img src="{{ asset('images/others/3.jpg') }}"
          class="md:size-full max-md:h-40 max-md:w-full object-cover transform transition duration-800 ease-in-out group-hover:scale-125 group-hover:-rotate-2">
        <div class="absolute inset-0 bg-blue-700/30 flex items-center justify-center">
          <h1 class="font-semibold text-3xl text-white">Our Goals</h1>
        </div>
      </div>
      <div class="flex-1 flex flex-col justify-center gap-8 p-6">
        <div class="h-0.5 w-10 bg-blue-700"></div>
        <p class="font-medium text-gray-600">
          Imbued with its Vision and Mission, the OCC aspires to:
          <br>
          • Become a digitally driven educational institution in teaching and innovation;
          <br>
          • Engage students in research-based instruction aimed at enhancing competitiveness; and
          <br>
          • Participate in and support programs that develop leadership and entrepreneurship skills.
        </p>
      </div>
    </div>
  </div>
</section>