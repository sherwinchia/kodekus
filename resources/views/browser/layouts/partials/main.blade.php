<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('meta-content')

  <link rel="icon" type='image/x-icon' href="{{ asset('images/brand/favicon.ico') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/brand/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/brand/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/brand/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('images/brand/site.webmanifest') }}">
  <!-- Fonts -->
  {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

  <link href="{{ mix('css/browser.css') }}" rel="stylesheet">
  <livewire:styles />
  @stack('styles')
</head>

<body>
  <div class="" id="app">
    @yield('master')
    {{-- @include('browser.layouts.partials.loginmodal') --}}
  </div>
  <livewire:scripts />
  @include('browser.layouts.partials.scripts')
</body>

</html>