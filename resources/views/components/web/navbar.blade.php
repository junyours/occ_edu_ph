@php
  $items = [
    ['name' => 'Home', 'route' => route('home')],
    [
      'name' => 'Academic Programs',
      'subitems' => [
        ['name' => 'Teacher Education Department', 'route' => route('ted'), 'target' => '_self', 'image' => asset('images/departments/TED.png')],
        ['name' => 'College of Business Administration', 'route' => route('cba'), 'target' => '_self', 'image' => asset('images/departments/CBA.png')],
        ['name' => 'College of Information Technology', 'route' => route('cit'), 'target' => '_self', 'image' => asset('images/departments/CIT.png')],
      ]
    ],
    ['name' => 'News', 'route' => route('news')],
    ['name' => 'SDG', 'route' => route('sdg')],
    [
      'name' => 'Services',
      'subitems' => [
        ['name' => 'Enrollment System', 'route' => 'https://sis.occph.com/login', 'target' => '_blank'],
      ]
    ],
  ]
@endphp

<div class="bg-slate-800 text-white">
  <div class="max-w-6xl mx-auto px-4 md:px-6 py-4 flex items-center justify-end md:justify-between">
    <div class="hidden items-center gap-6 md:flex">
      <a href="#" class="hover:text-blue-700 text-sm transition-colors">
        Staff
      </a>
      <a href="#" class="hover:text-blue-700 text-sm transition-colors">
        Alumni
      </a>
      <a href="#" class="hover:text-blue-700 text-sm transition-colors">
        Faculty
      </a>
      <a href="#" class="hover:text-blue-700 text-sm transition-colors">
        Community
      </a>
    </div>
    <div class="flex items-center gap-4">
      <div class="flex items-center gap-2">
        <i data-lucide="message-circle-question-mark" class="size-5" stroke-width="1.5"></i>
        <a href="#" class="hover:text-blue-700 text-sm transition-colors">
          FAQ
        </a>
      </div>
      <div class="h-4 border-r-[1.5px] border-gray-300"></div>
      <img src="{{ asset('images/flag.png') }}" alt="philippine-flag" class="h-6 object-contain">
    </div>
  </div>
</div>
<nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false"
  class="bg-white/70 max-md:backdrop-blur-md max-md:shadow-2xl max-md:sticky max-md:top-0 max-md:z-50">
  <div class="relative max-w-6xl mx-auto md:px-6 md:pt-6 md:pb-12 max-md:p-4 max-md:pb-5">
    <div class="flex items-center justify-between">
      <a href="{{ route('home') }}" class="shrink-0">
        <img src="{{ asset('images/logo.png') }}" alt="occ-logo" class="h-12 object-contain">
      </a>
      <div class="hidden items-center gap-6 md:flex">
        <div class="flex items-center gap-4">
          <div class="border border-gray-300 p-2">
            <i data-lucide="map-pin" class="size-5 text-blue-700" stroke-width="1.5"></i>
          </div>
          <div class="flex flex-col">
            <span class="text-gray-600 text-xs font-medium">Address</span>
            <a href="https://maps.app.goo.gl/88x9eRcWgGJrrc4i6" target="_blank"
              class="font-semibold text-sm hover:underline">Poblacion, Opol, Misamis Oriental</a>
          </div>
        </div>
        <div class="h-8 border-r-[1.5px] border-gray-300"></div>
        <div class="flex items-center gap-4">
          <div class="border border-gray-300 p-2">
            <i data-lucide="Mail" class="size-5 text-blue-700" stroke-width="1.5"></i>
          </div>
          <div class="flex flex-col">
            <span class="text-gray-600 text-xs font-medium">Email</span>
            <a href="mailto:opolcommunitycollege@occ.edu.ph" target="_blank"
              class="font-semibold text-sm hover:underline">opolcommunitycollege@occ.edu.ph</a>
          </div>
        </div>
        <div class="h-8 border-r-[1.5px] border-gray-300"></div>
        <div class="flex items-center gap-4">
          <div class="border border-gray-300 p-2">
            <i data-lucide="phone" class="size-5 text-blue-700" stroke-width="1.5"></i>
          </div>
          <div class="flex flex-col">
            <span class="text-gray-600 text-xs font-medium">Phone Number</span>
            <a href="tel:+639152775842" target="_blank" class="font-semibold text-sm hover:underline">+63 915 277
              5842</a>
          </div>
        </div>
      </div>
      <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" type="button"
        class="flex z-20 md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
        <i data-lucide="menu" x-cloak x-show="!mobileMenuIsOpen" stroke-width="1.5" aria-hidden="true"></i>
        <i data-lucide="x" x-cloak x-show="mobileMenuIsOpen" stroke-width="1.5" aria-hidden="true"></i>
      </button>
      <ul x-cloak x-show="mobileMenuIsOpen"
        x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
        x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu"
        class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-gray-300 border-b border-gray-300 bg-white px-4 pb-4 pt-20 md:hidden max-md:shadow-2xl">
        @foreach ($items as $item)
          @if (isset($item['subitems']))
            <div x-data="{ isExpanded: false }" class="py-4">
              <button type="button" class="font-medium flex w-full items-center justify-between gap-4 text-left"
                x-on:click="isExpanded = ! isExpanded" x-bind:aria-expanded="isExpanded ? 'true' : 'false'">
                {{ $item['name'] }}
                <i data-lucide="chevron-down" class="size-5 shrink-0 transition" stroke-width="1.5"
                  x-bind:class="isExpanded  ?  'rotate-180'  :  ''"></i>
              </button>
              <li x-cloak x-show="isExpanded" x-collapse class="flex flex-col gap-2 mt-2">
                @foreach ($item['subitems'] as $subitem)
                  <a href="{{ $subitem['route'] }}" target="{{ $subitem['target'] }}"
                    class="w-full font-medium focus:underline">
                    {{ $subitem['name'] }}
                  </a>
                @endforeach
              </li>
            </div>
          @else
            <li class="py-4">
              <a href="{{ $item['route'] }}" class="w-full font-medium focus:underline">
                {{ $item['name'] }}
              </a>
            </li>
          @endif
        @endforeach
      </ul>
    </div>
    <div class="hidden absolute z-50 inset-x-0 -bottom-6.5 justify-center md:flex">
      <div class="bg-gray-200 flex-1 flex items-center gap-6 mx-6">
        <a href="#">
          <button type="button"
            class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap bg-slate-800 px-5.5 py-3.5 tracking-wide transition-colors text-center text-white cursor-pointer">
            <span class="relative z-10">
              Get More Info
            </span>
            <i data-lucide="move-right" stroke-width="1.5" class="relative z-10"></i>
            <span
              class="absolute left-0 top-0 h-full w-0 bg-blue-700 transition-all duration-600 ease-out group-hover:w-full"></span>
          </button>
        </a>
        <div class="flex items-center gap-6 whitespace-nowrap">
          @foreach ($items as $item)
            @if (isset($item['subitems']))
              <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button class="flex items-center gap-3 hover:text-blue-700 font-medium transition-colors cursor-pointer"
                  @click="open = !open" :aria-expanded="open">
                  {{ $item['name'] }}
                  <i data-lucide="chevron-down" class="size-5 shrink-0 transition" stroke-width="1.5"
                    x-bind:class="open  ?  'rotate-180'  :  ''"></i>
                </button>
                <div
                  class="absolute min-w-[280px] left-1/2 top-full border border-gray-300 -translate-x-1/2 mt-2 bg-white shadow-2xl p-6 z-50 space-y-4"
                  x-show="open" x-transition.origin.top.duration.200ms x-cloak>
                  @foreach ($item['subitems'] as $subitem)
                    <a href="{{ $subitem['route'] }}" target="{{ $subitem['target'] }}"
                      class="hover:text-blue-700 font-medium transition-colors flex items-center gap-2">
                      @if (isset($subitem['image']))
                        <img src="{{ $subitem['image'] }}" class="size-10 object-contain shrink-0">
                      @else
                        <i data-lucide="arrow-right" class="size-5" stroke-width="1.5"></i>
                      @endif
                      {{ $subitem['name'] }}
                    </a>
                  @endforeach
                </div>
              </div>
            @else
              <a href="{{ $item['route'] }}" class="hover:text-blue-700 font-medium transition-colors">
                {{ $item['name'] }}
              </a>
            @endif
          @endforeach
        </div>
        @include('components.web.search')
      </div>
    </div>
  </div>
</nav>