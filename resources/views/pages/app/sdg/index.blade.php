@extends('layouts.app')

@section('content')
  <div class="space-y-4 p-4">
    <div class="flex items-center justify-between gap-4">
      <div class="relative flex w-full max-w-xs flex-col gap-1 text-neutral-600">
        <i data-lucide="search" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50"
          stroke-width="1.5"></i>
        <input type="search"
          class="w-full rounded-sm border border-neutral-300 bg-neutral-50 py-2 pl-10 pr-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75"
          name="search" placeholder="Search" aria-label="search" />
      </div>
      <a href="{{ route('admin.create.sdg') }}">
        <button type="button"
          class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-sm bg-black border border-black px-4 py-2 text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed">
          <i data-lucide="plus" class="size-5 fill-neutral-100" stroke-width="1.5"></i>
          Create
        </button>
      </a>
    </div>
    <div class="relative overflow-x-auto rounded-sm border border-neutral-300">
      <table class="w-full text-left text-sm text-neutral-600">
        <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900">
          <tr>
            <th scope="col" class="px-16 py-3">
              <span class="sr-only">Image</span>
            </th>
            <th scope="col" class="px-6 py-3">
              Name
            </th>
            <th scope="col" class="px-6 py-3">
              Action
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-neutral-300">
          @foreach ($sdgs as $sdg)
            <tr>
              <td class="p-4">
                <img src="https://lh3.googleusercontent.com/d/{{ $sdg->image }}" class="w-16 object-contain">
              </td>
              <td class="px-6 py-4 min-w-sm uppercase">
                {{ $sdg->name }}
              </td>
              <td class="px-6 py-4">
                <a href="{{ route('admin.edit.sdg', $sdg->id) }}">
                  <button type="button"
                    class="whitespace-nowrap rounded-sm bg-transparent p-0.5 font-semibold text-blue-500 outline-blue-500 hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0">
                    Edit
                  </button>
                </a>
                <form method="POST" action="{{ route('admin.delete.sdg', $sdg->id) }}">
                  @csrf
                  <button type="submit"
                    class="whitespace-nowrap rounded-sm bg-transparent p-0.5 font-semibold text-red-500 outline-red-500 hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection