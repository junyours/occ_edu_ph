@extends('layouts.web')

@section('content')
  <div class="pt-20">
    <div class="space-y-20 max-w-4xl mx-auto p-6">
      <div class="space-y-6">
        <div>
          <a href="{{ url()->previous() }}">
            <button type="button"
              class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-sm border text-blue-600 border-blue-600 px-4 py-2 text-sm font-medium tracking-wide transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed">
              <i data-lucide="arrow-left" class="size-5"></i>
              Back to News
            </button>
          </a>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-2xl">
          <div class="space-y-10">
            <div class="space-y-8">
              <h1 class="font-semibold text-2xl">{{ $article->title }}</h1>
              <div class="flex items-center gap-1.5">
                <i data-lucide="calendar" class="size-5"></i>
                <span class="text-sm font-medium">
                  {{ Illuminate\Support\Carbon::parse($article->date)->format('F j, Y') }}
                </span>
              </div>
              <div class="flex items-center gap-1.5 flex-wrap">
                @foreach ($article->sdg as $sdg)
                  <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="size-14 object-contain">
                @endforeach
              </div>
            </div>
            <div class="h-96">
              <img src="https://lh3.googleusercontent.com/d/{{ $article->image }}"
                class="size-full object-cover rounded-2xl shadow-2xl">
            </div>
            <p>{{ $article->description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection