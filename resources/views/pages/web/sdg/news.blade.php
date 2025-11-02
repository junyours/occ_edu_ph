@extends('layouts.web')

@section('content')
  <div class="max-w-7xl mx-auto pt-12 px-6 pb-6 space-y-20">
    <div class="space-y-4">
      <div class="grid grid-cols-9 gap-4">
        @foreach ($sdgs as $item)
          <a href={{ route('sdg.news', $item->name) }} class="transition duration-300 hover:scale-105">
            <img src="https://lh3.googleusercontent.com/d/{{ $item->image }}" class="object-contain">
          </a>
        @endforeach
        <a href="{{ route('news') }}" class="transition duration-300 hover:scale-105">
          <img src="{{ asset('images/sdg/0.png') }}" class="object-contain">
        </a>
      </div>
      <div class="border-b border-gray-300"></div>
    </div>
    <div class="flex gap-6 h-96">
      <div class="flex-1">
        <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="size-full object-contain">
      </div>
      <div class="flex-1">

      </div>
    </div>
    <div class="border-b border-gray-300"></div>
    <div class="space-y-8">
      <div class="space-y-2">
        <div class="flex items-center gap-4">
          <div class="h-0.5 w-10 bg-blue-600"></div>
          <h1 class="font-semibold text-xl text-blue-600 uppercase">
            {{ $sdg->name }} | <span class="capitalize">Latest News & Updates</span>
          </h1>
        </div>
        <h1 class="text-3xl font-semibold">Catch up on what’s new</h1>
      </div>
      <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($news as $item)
          <div class="flex flex-col border border-gray-300">
            <div class="group h-56 overflow-hidden relative">
              <img src="https://lh3.googleusercontent.com/d/{{ $item->image }}"
                class="size-full object-cover transform transition duration-800 ease-in-out group-hover:scale-125 group-hover:-rotate-2">
              <div class="absolute top-4 left-4 bg-blue-600 flex flex-col items-center">
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
                <h1 class="text-2xl font-semibold line-clamp-2">{{ $item->title }}</h1>
                <p class="text-gray-600 line-clamp-3">{{ $item->description }}</p>
              </div>
              <a href="{{ route('news.article', $item->id) }}" class="w-fit">
                <button type="button"
                  class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-900 px-5.5 py-3.5 tracking-wide transition-colors text-center cursor-pointer">
                  <span class="relative z-10 transition-colors duration-300 group-hover:text-white">
                    Read More
                  </span>
                  <i data-lucide="move-right" stroke-width="1.5"
                    class="relative z-10 transition-colors duration-300 group-hover:text-white"></i>
                  <span
                    class="absolute left-0 top-0 h-full w-0 bg-slate-900 transition-all duration-600 ease-out group-hover:w-full"></span>
                </button>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection