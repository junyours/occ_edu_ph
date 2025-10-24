@php
  $items = [
    ['name' => 'Home', 'route' => 'home'],
    [
      'name' => 'Services',
      'subitems' => [
        ['name' => 'Enrollment System', 'route' => 'https://occph.com/login'],
      ]
    ],
    ['name' => 'SDG', 'route' => 'sdg'],
  ]
@endphp

<nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false"
  class="bg-white fixed w-full shadow-2xl z-50" aria-label="penguin ui menu">
  <div class="h-20 max-w-7xl mx-auto px-6 flex items-center justify-between gap-4">
    <a href={{ route('home') }}>
      <img src={{ asset('images/logo.svg') }} alt="logo" class="h-10 sm:h-12">
    </a>
    <ul class="hidden items-center gap-6 md:flex">
      @foreach ($items as $item)
        @if (isset($item['subitems']))
          <li class="relative mx-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
            <button class="flex items-center gap-3 font-bold" :aria-expanded="open">
              {{ $item['name'] }}
              <i data-lucide="chevron-down" class="size-5 shrink-0 transition" stroke-width="1.5"
                x-bind:class="open  ?  'rotate-180'  :  ''"></i>
            </button>
            <ul
              class="absolute min-w-[280px] left-1/2 top-full border border-gray-200 -translate-x-1/2 mt-2 bg-white rounded-2xl shadow-2xl p-6"
              x-show="open" x-transition.origin.top.duration.200ms x-cloak>
              @foreach ($item['subitems'] as $subitem)
                <li x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
                  class="relative font-semibold">
                  <a href="{{ $subitem['route'] }}" target="_blank">
                    {{ $subitem['name'] }}
                    <span :class="hover ? 'w-full' : 'w-0'"
                      class="absolute left-0 -bottom-2 h-[3px] transition-all duration-300 ease-in-out bg-linear-to-r from-cyan-300 via-sky-400 to-blue-500"></span>
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
        @else
          <a href={{ route($item['route']) }} class="mx-2">
            <li x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative font-bold">
              {{ $item['name'] }}
              <span :class="hover ? 'w-full' : 'w-0'"
                class="absolute left-0 -bottom-2 h-[3px] transition-all duration-300 ease-in-out bg-linear-to-r from-cyan-300 via-sky-400 to-blue-500"></span>
            </li>
          </a>
        @endif
      @endforeach
    </ul>
    <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" type="button"
      class="z-20 size-6 md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
      <i data-lucide="menu" x-cloak x-show="!mobileMenuIsOpen" stroke-width="1.5" aria-hidden="true"></i>
      <i data-lucide="x" x-cloak x-show="mobileMenuIsOpen" stroke-width="1.5" aria-hidden="true"></i>
    </button>
    <ul x-cloak x-show="mobileMenuIsOpen"
      x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
      x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
      x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
      x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu"
      class="bg-white fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col gap-6 px-6 pb-6 pt-20 md:hidden">
      @foreach ($items as $item)
        @if (isset($item['subitems']))
          <div x-data="{ isExpanded: false }" class="space-y-2">
            <button type="button" class="font-bold flex w-full items-center justify-between gap-4 text-left"
              x-on:click="isExpanded = ! isExpanded" x-bind:aria-expanded="isExpanded ? 'true' : 'false'">
              {{ $item['name'] }}
              <i data-lucide="chevron-down" class="size-5 shrink-0 transition" stroke-width="1.5"
                x-bind:class="isExpanded  ?  'rotate-180'  :  ''"></i>
            </button>
            <ul x-cloak x-show="isExpanded" x-collapse class="space-y-2">
              @foreach ($item['subitems'] as $subitem)
                <a href="{{ $subitem['route'] }}" target="_blank">
                  <li x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
                    class="relative font-semibold">
                    {{ $subitem['name'] }}
                    <span :class="hover ? 'w-full' : 'w-0'"
                      class="absolute left-0 -bottom-2 h-[3px] transition-all duration-300 ease-in-out bg-linear-to-r from-cyan-300 via-sky-400 to-blue-500"></span>
                  </li>
                </a>
              @endforeach
            </ul>
          </div>
        @else
          <a href={{ route($item['route']) }}>
            <li x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative font-bold">
              {{ $item['name'] }}
              <span :class="hover ? 'w-full' : 'w-0'"
                class="absolute left-0 -bottom-2 h-[3px] transition-all duration-300 ease-in-out bg-linear-to-r from-cyan-300 via-sky-400 to-blue-500"></span>
            </li>
          </a>
        @endif
      @endforeach
    </ul>
  </div>
</nav>