<section class="relative bg-cover" style="background-image: url('{{ asset('images/backgrounds/2.jpg') }}');">
  <div class="absolute inset-0 bg-white/30"></div>
  <div class="relative bg-linear-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/1 py-20">
    <h1 class="text-3xl font-extrabold uppercase text-center text-white">Latest News & Updates</h1>
  </div>
  <div class="relative max-w-6xl mx-auto p-6 space-y-20">
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
    <div class="flex justify-center">
      <button type="button"
        class="whitespace-nowrap bg-linear-to-r from-cyan-300 via-sky-400 to-blue-500 rounded-full px-6 py-4 font-semibold tracking-wide text-white transition hover:opacity-75 text-center active:opacity-100 disabled:opacity-75 disabled:cursor-not-allowed uppercase shadow-2xl duration-300 hover:scale-105 cursor-pointer">See
        More News</button>
    </div>
  </div>
</section>