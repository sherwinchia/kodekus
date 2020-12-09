@extends('browser.layouts.partials.main')

@section('master')

{{-- @include('browser.layouts.partials.navbar') --}}

{{-- <livewire:browser.partials.navbar-component /> --}}

<a class=" h-12 w-12 bg-primary rounded-full cursor-pointer flex items-center justify-center" id="back-to-top">
  <i class="fas fa-arrow-circle-up text-xl text-gray-100"></i>
</a>

{{-- <div class="h-20 bg-base"></div> --}}

<main class="flex flex-col min-h-screen bg-base">
  @yield('content')
</main>

{{-- @include('browser.layouts.partials.footer') --}}

@endsection