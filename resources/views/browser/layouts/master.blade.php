@extends('browser.layouts.partials.main')

@section('master')

{{-- @include('browser.layouts.partials.navbar') --}}

<livewire:browser.partials.navbar-component />

<div class="h-24"></div>

<main class="flex flex-col">
  @yield('content')
</main>

@include('browser.layouts.partials.footer')

@endsection