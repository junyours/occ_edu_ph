@extends('layouts.web')

@section('content')
  <div class="pt-8">
    <div class="space-y-20 max-w-3xl mx-auto p-6">
      <div class="flex flex-col gap-6">
        <a href="{{ url()->previous() }}">
          <button type="button"
            class="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-900 px-5.5 py-3.5 tracking-wide transition-colors text-center cursor-pointer">
            <i data-lucide="move-left" stroke-width="1.5"
              class="relative z-10 transition-colors duration-300 group-hover:text-white"></i>
            <span class="relative z-10 transition-colors duration-300 group-hover:text-white">
              Back to News
            </span>
            <span
              class="absolute left-0 top-0 h-full w-0 bg-slate-900 transition-all duration-600 ease-out group-hover:w-full"></span>
          </button>
        </a>
        <div class="space-y-10">
          <div class="space-y-8">
            <h1 class="text-2xl font-semibold">{{ $article->title }}</h1>
            <div class="flex items-center gap-2">
              <i data-lucide="calendar"></i>
              <span class="font-medium">
                {{ Illuminate\Support\Carbon::parse($article->date)->format('F j, Y') }}
              </span>
            </div>
            <div class="flex items-center gap-2 flex-wrap">
              @foreach ($article->sdg as $sdg)
                <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="size-14 object-contain">
              @endforeach
            </div>
          </div>
          <img src="https://lh3.googleusercontent.com/d/{{ $article->image }}" class="size-full object-cover">
          <p class="whitespace-pre-line text-gray-600">{{ $article->description }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection