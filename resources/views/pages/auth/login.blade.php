@extends('layouts.auth')

@section('content')
  <form method="POST" action="{{ route('login') }}" x-data="{ processing: false }" @submit="processing = true"
    class="space-y-8">
    @csrf
    <div class="space-y-4">
      <x-ui.input label="Email Address" name="email" />
      <x-ui.input-password label="Password" name="password" />
    </div>
    <x-ui.button label="Login" />
  </form>
@endsection