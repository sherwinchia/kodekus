@extends('browser.layouts.partials.main')

@section('master')

@include('browser.layouts.partials.navbar')

<main class="flex flex-col min-h-screen">
  @yield('content')
</main>

@include('browser.layouts.partials.footer')

@endsection