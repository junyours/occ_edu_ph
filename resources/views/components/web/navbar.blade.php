@php
  $items = [
    ['name' => 'Home', 'route' => 'home'],
    ['name' => 'About Us', 'route' => 'home'],
    ['name' => 'Programs', 'route' => 'home'],
    ['name' => 'Events', 'route' => 'home'],
    ['name' => 'News', 'route' => 'news'],
    ['name' => 'Contact Us', 'route' => 'home'],
    ['name' => 'Sevices', 'route' => 'home'],
    ['name' => 'SDG', 'route' => 'sdg'],
  ]
@endphp

<div class="hidden bg-slate-900 text-white md:block">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-6">
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
        <i data-lucide="user-round" class="size-5" stroke-width="1.5"></i>
        @if (Auth::check())
          <a href="{{ route('dashboard') }}" class="hover:text-blue-700 text-sm transition-colors">
            {{ Auth::user()->name }}
          </a>
        @else
          <a href="{{ route('login') }}" class="hover:text-blue-700 text-sm transition-colors">
            Login
          </a>
        @endif
      </div>
      <div class="h-4 border-r-[1.5px] border-gray-300"></div>
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
  class="bg-white max-md:shadow max-md:sticky max-md:top-0 max-md:z-50">
  <div class="relative max-w-7xl mx-auto md:px-6 md:pt-6 md:pb-12 max-md:p-4 max-md:pb-5">
    <div class="flex items-center justify-between">
      <a href="{{ route('home') }}" class="shrink-0">
        <img src="{{ asset('images/logo.svg') }}" alt="occ-logo" class="h-12 object-contain">
      </a>
      <div class="hidden items-center gap-6 md:flex">
        <div class="flex items-center gap-4">
          <div class="border border-gray-300 p-2">
            <i data-lucide="map-pin" class="size-5 text-blue-700" stroke-width="1.5"></i>
          </div>
          <div class="flex flex-col">
            <span class="text-gray-600 text-xs font-medium">Address</span>
            <a href="https://maps.app.goo.gl/88x9eRcWgGJrrc4i6" target="_blank"
              class="font-semibold text-sm hover:underline">C. Salva
              St, Opol, 9016 Misamis Oriental</a>
          </div>
        </div>
        <div class="h-8 border-r-[1.5px] border-gray-300"></div>
        <div class="flex items-center gap-4">
          <div class="border border-gray-300 p-2">
            <i data-lucide="Mail" class="size-5 text-blue-700" stroke-width="1.5"></i>
          </div>
          <div class="flex flex-col">
            <span class="text-gray-600 text-xs font-medium">Email</span>
            <a href="mailto:opolcommunitycollege@yahoo.com" target="_blank"
              class="font-semibold text-sm hover:underline">opolcommunitycollege@yahoo.com</a>
          </div>
        </div>
        <div class="h-8 border-r-[1.5px] border-gray-300"></div>
        <div class="flex items-center gap-4">
          <div class="border border-gray-300 p-2">
            <i data-lucide="phone" class="size-5 text-blue-700" stroke-width="1.5"></i>
          </div>
          <div class="flex flex-col">
            <span class="text-gray-600 text-xs font-medium">Phone Number</span>
            <a href="tel:09532609906" target="_blank" class="font-semibold text-sm hover:underline">+63 953 260 9906</a>
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
        class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-gray-300 border-b border-gray-300 bg-white px-4 pb-4 pt-20 md:hidden">
        @foreach ($items as $item)
          <li class="py-4">
            <a href="{{ route($item['route']) }}" class="w-full font-medium focus:underline">
              {{ $item['name'] }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="hidden absolute z-50 inset-x-0 -bottom-6.5 justify-center md:flex">
      <div class="bg-gray-100 flex-1 flex items-center gap-6 mx-6">
        <a href="#">
          <button type="button"
            class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap bg-slate-900 px-5.5 py-3.5 tracking-wide transition-colors text-center text-white cursor-pointer">
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
            <a href="{{ route($item['route']) }}" class="hover:text-blue-700 font-medium transition-colors">
              {{ $item['name'] }}
            </a>
          @endforeach
        </div>
        @include('components.web.search')
      </div>
    </div>
  </div>
</nav>