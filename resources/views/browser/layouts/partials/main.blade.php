<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('meta-content')

  <link rel="icon" type='image/x-icon' href="{{ asset('images/brand/favicon.ico') }}">

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