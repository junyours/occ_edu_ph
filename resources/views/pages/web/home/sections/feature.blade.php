@php
  $items = [
    [
      'bg' => '#FFF6F8',
      'icon' => asset('images/icons/feature-icon-1.svg'),
      'title' => 'College Life',
      'description' => 'Enjoy a vibrant campus life filled with activities, friendships, and meaningful experiences every day.',
    ],
    [
      'bg' => '#EEF1F4',
      'icon' => asset('images/icons/feature-icon-2.svg'),
      'title' => 'Research',
      'description' => 'Explore new ideas and innovations through hands-on research that inspires discovery and growth.',
    ],
    [
      'bg' => '#F3F0F8',
      'icon' => asset('images/icons/feature-icon-1.svg'),
      'title' => 'Athletics',
      'description' => 'Show your school spirit and teamwork through exciting sports programs and athletic achievements.',
    ],
    [
      'bg' => '#F0FFF6',
      'icon' => asset('images/icons/feature-icon-2.svg'),
      'title' => 'Academics',
      'description' => 'Pursue academic excellence through quality education, dedicated mentors, and modern learning opportunities.',
    ],
  ];
@endphp

<section class="max-w-6xl mx-auto relative">
  <div class="-mt-24 md:-mt-36 mx-4 md:mx-6">
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
      @foreach ($items as $item)
        <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown = false"
          class="flex flex-col p-6 space-y-8 shadow-2xl border border-slate-100 transform transition duration-800 ease-out"
          :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
          style="background-color: {{ $item['bg'] }}">
          <img src="{{ $item['icon'] }}" alt="feature-icon" class="size-14">
          <div class="flex-1 space-y-4">
            <h1 class="text-2xl font-semibold">{{ $item['title'] }}</h1>
            <p class="text-gray-600 text-sm">{{ $item['description'] }}</p>
          </div>
          <button type="button"
            class="w-full relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-800 px-5.5 py-3.5 tracking-wide transition-colors text-center cursor-pointer">
            <span class="relative z-10 transition-colors duration-300 group-hover:text-white">
              Learn More
            </span>
            <i data-lucide="move-right" stroke-width="1.5"
              class="relative z-10 transition-colors duration-300 group-hover:text-white"></i>
            <span
              class="absolute left-0 top-0 h-full w-0 bg-slate-800 transition-all duration-600 ease-out group-hover:w-full"></span>
          </button>
        </div>
      @endforeach
    </div>
  </div>
</section>