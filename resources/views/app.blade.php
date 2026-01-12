<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="X3jWLb8LBSj3SI1rvMOHqDCFdPB3XhL62KXwWJaOR-c" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">

    <title inertia>{{ config('app.name') }}</title>

    @isset($article_meta)
        <meta property="og:title" content="{{ $article_meta['title'] }}">
        <meta property="og:description" content="{{ $article_meta['description'] }}">
        <meta property="og:image" content="{{ $article_meta['image'] }}">
        <meta property="og:type" content="{{ $article_meta['type'] }}">
        <meta property="og:url" content="{{ $article_meta['url'] }}">
        <meta property="og:site_name" content="{{ $article_meta['site_name'] }}">
    @endisset

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @routes
    @viteReactRefresh
    @vite(['resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>