<section class="relative h-[400px] md:h-[600px] w-full overflow-hidden">
  <video class="size-full object-cover" autoplay loop muted playsinline>
    <source src="{{ asset('videos/promotional.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <div class="absolute inset-0 bg-black/50"></div>
  <div class="max-w-6xl mx-auto">
    <div class="absolute bottom-20 md:bottom-30 mx-4 md:mx-6 space-y-10 text-white">
      <div class="flex flex-col gap-4 max-md:items-center max-md:text-center">
        <h1 class="font-bold text-2xl md:text-4xl">
          Welcome to
        </h1>
        <h2 class="font-bold text-3xl md:text-5xl uppercase">
          Opol Community College
        </h2>
        <p class="md:text-lg">
          Fueling ambition, advancing knowledge, and creating opportunities for every learner.
        </p>
      </div>
      <div class="hidden items-center gap-8 md:flex">
        <button type="button"
          class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap bg-blue-700 px-5.5 py-3.5 tracking-wide transition-colors text-center text-white cursor-pointer">
          <span class="relative z-10 transition-colors duration-300 group-hover:text-slate-800">
            Admission Now
          </span>
          <i data-lucide="move-right" stroke-width="1.5"
            class="relative z-10 transition-colors duration-300 group-hover:text-slate-800"></i>
          <span
            class="absolute left-0 top-0 h-full w-0 bg-white transition-all duration-600 ease-out group-hover:w-full"></span>
        </button>
        <button type="button"
          class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-white px-5.5 py-3.5 tracking-wide transition-colors text-center text-white cursor-pointer">
          <span class="relative z-10 transition-colors duration-300 group-hover:text-slate-800">
            View Program
          </span>
          <i data-lucide="move-right" stroke-width="1.5"
            class="relative z-10 transition-colors duration-300 group-hover:text-slate-800"></i>
          <span
            class="absolute left-0 top-0 h-full w-0 bg-white transition-all duration-600 ease-out group-hover:w-full"></span>
        </button>
      </div>
    </div>
  </div>
</section>