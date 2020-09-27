@extends('admin.layouts.partials.main')

@section('master')

<main class="flex flex-col flex-wrap min-h-screen h-screen">

  @yield('content')

  {{-- <div class="footer text-center p-3 bg-white ">
      Design and Built by Sherwin Variancia
    </div> --}}
</main>
@endsection