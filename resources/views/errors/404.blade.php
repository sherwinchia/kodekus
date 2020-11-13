{{-- @extends('errors::illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}

@extends('browser.layouts.error')

@section('content')
<main class="flex flex-col min-h-screen">
  <div class="container flex-1 mx-auto flex flex-col justify-center">
    <div class="flex flex-col items-center lg:items-start">
      <h1 class="text-6xl font-bold">404</h1>
      <span class="border-b-4 rounded-full border-black w-10 mb-4"></span>
      <div class="">
        <p>Sorry we couldn't find this page</p>
      </div>
      <div class="my-4">
        <a href="{{ route('browser.home.index') }}" class="border border-black rounded-sm p-2 cursor-pointer">Back to
          Home</a>
      </div>
    </div>
  </div>
</main>

@endsection