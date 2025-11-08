<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="google-site-verification" content="X3jWLb8LBSj3SI1rvMOHqDCFdPB3XhL62KXwWJaOR-c" />
  <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">

  <title>{{ config('app.name') }}</title>

  @yield('meta')

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ loading: false }" x-init="
    window.addEventListener('beforeunload', () => loading = true);
    window.addEventListener('pageshow', () => loading = false);
  " class="text-slate-800 antialiased">
  <x-ui.loader />
  @include('components.web.navbar')
  <main>
    @yield('content')
  </main>
  <div class="mt-10 md:mt-20">
    @include('components.web.footer')
  </div>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</body>

</html>