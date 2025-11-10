@extends('layouts.web')

@section('content')
  <div class="relative bg-linear-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/1 py-10 md:py-28 px-4 md:px-6">
    <h1 class="text-2xl md:text-3xl font-extrabold uppercase text-center text-white">Latest News & Updates</h1>
  </div>
  <div id="news-list" class="max-w-6xl mx-auto px-4 md:px-6 space-y-8">
    <div class="flex md:items-center md:justify-between max-md:gap-4 max-md:flex-col-reverse">
      <div class="w-fit bg-gray-100 py-2 px-3 text-sm">
        <h1 class="space-x-1.5"><span class="font-semibold text-blue-700">{{ $count }}</span><span
            class="text-gray-600">articles
            found</span></h1>
      </div>
      <form method="GET" action="{{ route('news') }}#news-list"
        class="relative flex h-10 w-full max-w-md flex-col gap-1 text-neutral-600">
        <input value="{{ request('search') }}" type="search"
          class="h-full w-full border border-neutral-300 bg-neutral-50 pl-4 pr-18 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75"
          name="search" placeholder="Search news and articles..." />
        <button type="submit"
          class="absolute right-0 h-full inline-flex justify-center items-center aspect-square whitespace-nowrap bg-slate-800 px-4 text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-white dark:text-slate-800 dark:focus-visible:outline-white">
          <i data-lucide="search" stroke-width="1.5"></i>
        </button>
      </form>
    </div>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
      @foreach ($news as $item)
        <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown = false"
          class="flex flex-col shadow-2xl border border-slate-100 transform transition duration-800 ease-out"
          :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
          <div class="group h-44 md:h-56 overflow-hidden relative">
            <img src="https://lh3.googleusercontent.com/d/{{ $item->image }}"
              class="size-full object-cover transform transition duration-800 ease-in-out group-hover:scale-125 group-hover:-rotate-2">
            <div class="absolute top-4 left-4 bg-blue-700 flex flex-col items-center shadow-2xl border border-slate-100">
              <h1 class="font-semibold text-2xl text-white p-2">
                {{ Illuminate\Support\Carbon::parse($item->date)->format('j') }}
              </h1>
              <p class="font-medium text-xs bg-white p-1">
                {{ Illuminate\Support\Carbon::parse($item->date)->format('M, Y') }}
              </p>
            </div>
          </div>
          <div class="flex-1 p-6 flex flex-col gap-6">
            <div class="flex-1 space-y-4">
              <div class="flex items-center gap-1.5 flex-wrap">
                <div class="grid grid-cols-8 gap-2">
                  @foreach ($item->sdg as $sdg)
                    <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="object-contain">
                  @endforeach
                </div>
              </div>
              <h1 class="text-xl font-semibold line-clamp-1 md:line-clamp-2">{{ $item->title }}</h1>
              <p class="text-gray-600 line-clamp-2 md:line-clamp-3 text-sm">{{ $item->description }}</p>
            </div>
            <a href="{{ route('news.article', ['id' => $item->image]) }}" class="w-fit">
              <button type="button"
                class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-800 px-5.5 py-3.5 tracking-wide transition-colors text-center cursor-pointer">
                <span class="relative z-10 transition-colors duration-300 group-hover:text-white">
                  Read More
                </span>
                <i data-lucide="move-right" stroke-width="1.5"
                  class="relative z-10 transition-colors duration-300 group-hover:text-white"></i>
                <span
                  class="absolute left-0 top-0 h-full w-0 bg-slate-800 transition-all duration-600 ease-out group-hover:w-full"></span>
              </button>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection