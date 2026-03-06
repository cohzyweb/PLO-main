<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'PLOグループ') }}</title>
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/scss/groups.scss', 'resources/js/groups.js'])
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')
  </head>
  <body class="{{ request()->routeIs('public.group.home') || request()->routeIs('public.groups.home') || request()->routeIs('public.group.home-v2') || request()->routeIs('public.groups.home-v2') ? 'groups-home-page' : '' }}">

    <!-- 年齢確認モーダル -->
    {{-- <x-age-verification-modal /> --}}

    <!-- Header -->
    <x-public.groups.header />

    <!-- Drawer -->
    <x-public.groups.drawer />

    <!-- Main -->
    <main class="main" id="main">
      {{ $slot }}
    </main>

    <!-- Footer -->
    {{-- <x-public.groups.footer /> --}}
    <x-public.group.bottom-nav />
    @stack('scripts')
  </body>
</html>
