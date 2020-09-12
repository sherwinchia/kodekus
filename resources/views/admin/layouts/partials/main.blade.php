<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('meta-content')

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/cde5973eff.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
  <script src='https://cdn.tiny.cloud/1/kl4b9kwmcthfey9pzqwlxr2ft8gd3ignrzerwfxhhkxeqy8s/tinymce/5/tinymce.min.js'
    referrerpolicy="origin">
  </script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <livewire:styles />
  @stack('styles')

</head>

<body>
  <div id="app">
    @yield('master')
  </div>
  <livewire:scripts />
  @yield('scripts')
</body>

</html>