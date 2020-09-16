<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('meta-content')

  <!-- Scripts -->
  <script src="https://kit.fontawesome.com/cde5973eff.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
  <livewire:styles />
  @stack('styles')

</head>

<body>
  @routes
  <div class="relative" id="app">
    @yield('master')
  </div>
  <livewire:scripts />
  @include('admin.layouts.partials.scripts')
</body>

</html>