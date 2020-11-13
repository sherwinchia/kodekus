{{-- @extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests')) --}}

@extends('browser.layouts.error')

@section('content')
<main class="flex flex-col min-h-screen">
  <div class="container flex-1 mx-auto flex flex-col justify-center">
    <div class="flex flex-col items-center lg:items-start">
      <h1 class="text-6xl font-bold">429</h1>
      <span class="border-b-4 rounded-full border-black w-10 mb-4"></span>
      <div class="">
        <p>Sorry the page are handling too many requests. Try again later.</p>
      </div>
      <div class="my-4">
        <a href="{{ route('browser.home.index') }}" class="border border-black rounded-sm p-2 cursor-pointer">Back to
          Home</a>
      </div>
    </div>
  </div>
</main>

@endsection