@extends('layouts.app')

@section('content')
  <div class="p-4 max-w-lg mx-auto space-y-4">
    <h1 class="font-semibold">Edit SDG</h1>
    <form method="POST" action="{{ route('admin.update.sdg', $sdg->id) }}" x-data="{ processing: false }"
      @submit="processing = true" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <x-ui.input-file label="Image" name="image" />
      <x-ui.input label="Name" name="name" value="{{ $sdg->name }}" />
      <div class="flex justify-end">
        <div class="w-fit">
          <x-ui.button label="Update" />
        </div>
      </div>
    </form>
  </div>
@endsection