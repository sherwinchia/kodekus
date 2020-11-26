@extends('browser.layouts.partials.main')

@section('master')

{{-- @include('browser.layouts.partials.navbar') --}}

<livewire:browser.partials.navbar-component />

<div class="h-20 bg-base"></div>

<main class="flex flex-col min-h-screen bg-base">
  @yield('content')
</main>

@include('browser.layouts.partials.footer')

@endsection