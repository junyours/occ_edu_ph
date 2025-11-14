@extends('layouts.web')

@section('content')
  <div class="relative h-56 md:h-96 flex bg-linear-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/1">
    <div class="absolute inset-0 max-w-6xl mx-auto flex px-4 md:px-6">
      <div class="flex-1 flex items-center">
        <h1 class="text-xl md:text-4xl font-extrabold uppercase text-white">Sustainable Development Goals</h1>
      </div>
      <div class="flex-1"></div>
    </div>
    <div class="flex-1"></div>
    <div class="flex-1 flex items-center justify-center">
      <div class="size-30 md:size-60">
        <img src="{{ asset('images/sdg/bg.svg') }}" class="size-fit object-contain animate-spin [animation-duration:16s]">
      </div>
    </div>
  </div>
  <div class="max-w-6xl mx-auto px-4 md:px-6 space-y-10 md:space-y-20">
    <div class="grid grid-cols-4 md:grid-cols-6 gap-4">
      @foreach ($sdgs as $sdg)
        <a href="{{ route('sdg.news', $sdg->name) }}" class="transition duration-300 hover:scale-105">
          <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="object-contain shadow-2xl">
        </a>
      @endforeach
      <a href="{{ route('news') }}" class="transition duration-300 hover:scale-105">
        <img src="{{ asset('images/sdg/0.png') }}" class="object-contain shadow-2xl">
      </a>
    </div>
    <div class="w-full h-[400px] md:h-[550px]">
      <iframe width="100%" height="100%" src="https://www.youtube.com/embed/0XTBYMfZyrM?si=52P5xFl75e3f3yCh"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
  </div>
@endsection