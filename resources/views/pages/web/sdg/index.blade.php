@extends('layouts.web')

@section('content')
  <div class="pt-20">
    <div class="relative bg-linear-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/1 py-20">
      <h1 class="text-3xl font-extrabold uppercase text-center text-white">Sustainable Development Goals</h1>
    </div>
    <div class="space-y-20 max-w-6xl mx-auto px-6 pb-6">
      <div class="grid grid-cols-6 gap-4">
        @foreach ($sdgs as $sdg)
          <a href={{ route('sdg.news', $sdg->name) }} class="transition duration-300 hover:scale-105">
            <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="object-contain shadow-2xl">
          </a>
        @endforeach
      </div>
      <iframe width="100%" height="500" src="https://www.youtube.com/embed/0XTBYMfZyrM?si=52P5xFl75e3f3yCh"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
  </div>
@endsection