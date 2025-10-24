@extends('layouts.web')

@section('content')
  <div class="pt-20">
    <div class="space-y-10 max-w-6xl mx-auto p-6">
      <div class="space-y-4">
        <div class="grid grid-cols-9 gap-4">
          @foreach ($sdgs as $item)
            <a href={{ route('sdg.news', $item->name) }} class="transition duration-300 hover:scale-105">
              <img src="https://lh3.googleusercontent.com/d/{{ $item->image }}" class="object-contain shadow-2xl">
            </a>
          @endforeach
        </div>
        <div class="border-b border-gray-200"></div>
      </div>
      <div class="flex gap-6 h-96">
        <div class="flex-1">
          <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="size-full object-contain">
        </div>
        <div class="flex-1">

        </div>
      </div>
      <div class="border-b border-gray-200"></div>
      <div class="space-y-6">
        <h1 class="text-2xl font-extrabold uppercase">
          {{ $sdg->name }} | <span class="capitalize">News & Updates</span>
        </h1>
        <div class="grid grid-cols-3 gap-6">
          @foreach ($news as $item)
            <a href="{{ route('sdg.article', $item->id) }}" class="flex-1">
              <div class="h-full bg-white flex flex-col rounded-2xl shadow-2xl transition duration-300 hover:scale-105">
                <div class="h-56">
                  <img src="https://lh3.googleusercontent.com/d/{{ $item->image }}"
                    class="size-full object-cover rounded-t-2xl">
                </div>
                <div class="flex-1 p-6 flex flex-col gap-6 justify-between">
                  <div class="space-y-3">
                    <div class="flex items-center gap-1.5">
                      <i data-lucide="calendar" class="size-4"></i>
                      <span class="text-xs font-medium">
                        {{ Illuminate\Support\Carbon::parse($item->date)->format('F j, Y') }}
                      </span>
                    </div>
                    <h1 class="font-semibold line-clamp-2">{{ $item->title }}</h1>
                    <div class="flex items-center gap-1.5 flex-wrap">
                      <div class="grid grid-cols-8 gap-2">
                        @foreach ($item->sdg as $sdg)
                          <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="object-contain">
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <p class="text-gray-600/80 line-clamp-3 text-sm">{{ $item->description }}</p>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection