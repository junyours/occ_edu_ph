@php
  $items = [
    ['image' => asset('images/departments/TED.png'), 'href' => route('ted')],
    ['image' => asset('images/departments/CBA.png'), 'href' => route('cba')],
    ['image' => asset('images/departments/CIT.png'), 'href' => route('cit')],
  ]
@endphp

<section class="max-w-6xl mx-auto">
  <div class="mx-4 md:mx-6 space-y-8">
    <div class="space-y-2">
      <div class="flex items-center gap-4">
        <div class="h-0.5 w-10 bg-blue-700"></div>
        <h1 class="font-semibold text-lg text-blue-700 uppercase">Colleges</h1>
      </div>
      <h1 class="text-2xl font-semibold">Join our community</h1>
    </div>
    <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown = false"
      class="flex items-center gap-4 justify-around flex-wrap transform transition duration-800 ease-out"
      :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
      @foreach ($items as $item)
        <a href="{{ $item['href'] }}" class="transition duration-300 hover:scale-105">
          <img src="{{ $item['image'] }}" class="size-28 md:size-40 object-contain">
        </a>
      @endforeach
    </div>
  </div>
</section>