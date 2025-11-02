@php
  $items = [
    ['id' => 1, 'name' => 'Home', 'route' => route('home')],
    ['id' => 2, 'name' => 'About Us', 'route' => route('home')],
    ['id' => 3, 'name' => 'Programs', 'route' => route('home')],
    ['id' => 4, 'name' => 'Events', 'route' => route('home')],
    ['id' => 5, 'name' => 'News', 'route' => route('news')],
    ['id' => 6, 'name' => 'Contact Us', 'route' => route('home')],
    ['id' => 7, 'name' => 'Services', 'route' => route('home')],
    ['id' => 8, 'name' => 'SDG', 'route' => route('sdg')],
  ];
@endphp

<div x-data="{
    open: false,
    filterTerm: '',
    filterResults: @js($items),
    highlightedIndex: -1,
    modifierKey: '',

    init() {
      this.modifierKey = /mac/i.test(navigator.userAgentData ? navigator.userAgentData.platform : navigator.platform)
        ? '⌘' : 'Ctrl';
    },

    openCommandPalette() {
      this.filterTerm = '';
      this.filterResults = @js($items);
      this.highlightedIndex = -1;
      this.open = true;
      $nextTick(() => $refs.searchInput.focus());
    },

    closeCommandPalette() {
      this.open = false;
    },

    filter() {
      const term = this.filterTerm.toLowerCase();
      this.filterResults = @js($items).filter(i => i.name.toLowerCase().includes(term));
    },

    navigateResults(direction) {
      if (direction === 'next' && this.highlightedIndex < this.filterResults.length - 1) this.highlightedIndex++;
      if (direction === 'previous' && this.highlightedIndex > 0) this.highlightedIndex--;
    },

    selectOption(item) {
      window.location.href = item.route;
      this.closeCommandPalette();
    },

    isHighlighted(index) {
      return index === this.highlightedIndex;
    }
  }" x-on:keydown.ctrl.k.prevent.document="openCommandPalette()"
  x-on:keydown.meta.k.prevent.document="openCommandPalette()" class="h-full w-full">

  <!-- Toggle Button -->
  <button x-ref="toggleButton" x-on:click="openCommandPalette()" type="button"
    class="relative bg-gray-300 h-full w-full flex items-center justify-between cursor-pointer">
    <div class="flex items-center opacity-75 gap-1">
      <i data-lucide="search" class="absolute left-4 top-1/2 size-5 -translate-y-1/2"></i>
      <span class="py-2 pl-14 pr-4">Search</span>
    </div>
    <span class="flex-none text-xs font-semibold opacity-75 pr-4">
      <span x-text="modifierKey"></span> + K
    </span>
  </button>

  <!-- Backdrop -->
  <div x-cloak x-show="open" x-transition.opacity
    class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center"
    x-on:click.self="closeCommandPalette()" x-on:keydown.escape.prevent.stop="closeCommandPalette()">

    <!-- Palette Container -->
    <div class="bg-white w-full max-w-lg overflow-hidden" x-on:click.stop>
      <div class="flex items-center bg-gray-100 px-4 py-3 gap-4">
        <i data-lucide="search" class="size-5 opacity-50" stroke-width="1.5"></i>
        <input x-ref="searchInput" x-model="filterTerm" x-on:input.debounce.100ms="filter"
          x-on:keydown.arrow-down.prevent="navigateResults('next')"
          x-on:keydown.arrow-up.prevent="navigateResults('previous')"
          x-on:keydown.enter.prevent="selectOption(filterResults[highlightedIndex])" type="text"
          placeholder="Search pages..." class="w-full bg-transparent outline-none text-sm py-2" />
      </div>

      <ul class="max-h-64 overflow-y-auto divide-y divide-gray-100">
        <template x-for="(item, index) in filterResults" :key="item.id">
          <li x-on:click="selectOption(item)" x-on:mouseenter="highlightedIndex = index"
            x-bind:class="isHighlighted(index) ? 'bg-gray-200 text-gray-900' : 'text-gray-700'"
            class="cursor-pointer px-4 py-3 flex items-center gap-4 text-sm transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-60" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7" />
            </svg>
            <span x-text="item.name" class="font-medium"></span>
          </li>
        </template>
      </ul>

      <div x-show="filterResults.length === 0" class="p-4 text-center text-sm text-gray-500">
        No results found.
      </div>
    </div>
  </div>
</div>