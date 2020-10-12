@extends('browser.layouts.partials.main')

@section('master')

@include('browser.layouts.partials.navbar')

<main class="">
  @yield('content')
</main>
@endsection