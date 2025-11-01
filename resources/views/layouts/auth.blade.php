<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">

  <title>{{ config('app.name') }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
  <main class="min-h-screen flex items-center justify-center p-6">
    <div
      class="w-full max-w-sm group flex rounded-sm flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600">
      <div class="space-y-8 p-6">
        <div class="flex justify-center">
          <a href={{ route('home') }}>
            <img src="{{ asset('images/logo.svg') }}" alt="occ-logo" class="h-14 object-contain">
          </a>
        </div>
        @yield('content')
      </div>
    </div>
  </main>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</body>

</html>