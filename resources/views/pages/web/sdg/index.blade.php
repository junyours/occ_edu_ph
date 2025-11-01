@extends('layouts.web')

@section('content')
  <div class="relative bg-linear-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/1 py-28 px-6">
    <h1 class="text-3xl font-extrabold uppercase text-center text-white">Sustainable Development Goals</h1>
  </div>
  <div class="max-w-7xl mx-auto p-6 space-y-20">
    <div class="grid grid-cols-6 gap-4">
      @foreach ($sdgs as $sdg)
        <a href="{{ route('sdg.news', $sdg->name) }}" class="transition duration-300 hover:scale-105">
          <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="object-contain">
        </a>
      @endforeach
      <a href="{{ route('news') }}" class="transition duration-300 hover:scale-105">
        <img src="{{ asset('images/sdg/0.png') }}" class="object-contain">
      </a>
    </div>
    <iframe width="100%" height="500" src="https://www.youtube.com/embed/0XTBYMfZyrM?si=52P5xFl75e3f3yCh"
      title="YouTube video player" frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>
@endsection