<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

  <title>{{ config('app.name') }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
  <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">
    <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
    <a class="sr-only" href="#main-content">skip to the main content</a>

    <!-- dark overlay for when the sidebar is open on smaller screens  -->
    <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-neutral-950/10 backdrop-blur-xs md:hidden"
      aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

    @include('components.app.sidebar')

    <!-- top navbar & main content  -->
    <div class="h-svh w-full overflow-y-auto bg-white dark:bg-neutral-950">
      <!-- top navbar  -->
      @include('components.app.navbar')
      <!-- main content  -->
      <div id="main-content" class="max-w-7xl mx-auto p-4">
        <div class="overflow-y-auto">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</body>

</html>