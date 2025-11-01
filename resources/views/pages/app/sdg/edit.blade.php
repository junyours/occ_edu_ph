@extends('layouts.app')

@section('content')
  <div class="p-4 max-w-lg mx-auto space-y-4">
    <h1 class="font-semibold">Edit SDG</h1>
    <form method="POST" action="{{ route('admin.update.sdg', $sdg->id) }}" x-data="{ processing: false }"
      @submit="processing = true" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <div class="relative flex w-full flex-col gap-1">
        <label class="w-fit pl-0.5 text-sm text-neutral-600" for="image">Image</label>
        <input id="image" type="file"
          class="w-full overflow-clip rounded-sm border border-neutral-300 bg-neutral-50/50 text-sm text-neutral-600 file:mr-4 file:border-none file:bg-neutral-50 file:px-4 file:py-2 file:font-medium file:text-neutral-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
          name="image" required />
        @error('image')
          <small class="pl-0.5 text-red-500">{{ $message }}</small>
        @enderror
      </div>
      <div class="flex w-full flex-col gap-1 text-neutral-600">
        <label for="name" class="w-fit pl-0.5 text-sm">Name</label>
        <input id="name" type="text" value="{{ $sdg->name }}"
          class="w-full rounded-sm border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
          name="name" autocomplete="name" required />
        @error('name')
          <small class="pl-0.5 text-red-500">{{ $message }}</small>
        @enderror
      </div>
      <div class="flex justify-end">
        <button type="submit"
          class="whitespace-nowrap rounded-sm bg-black border border-black px-4 py-2 text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed"
          :disabled="processing">Update</button>
      </div>
    </form>
  </div>
@endsection