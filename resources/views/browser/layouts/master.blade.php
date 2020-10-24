@extends('browser.layouts.partials.main')

@section('master')

{{-- @include('browser.layouts.partials.navbar') --}}

<livewire:browser.partials.navbar-component />

<div class="h-16"></div>

<main class="flex flex-col min-h-screen">
  @yield('content')
</main>

@include('browser.layouts.partials.footer')

@endsection