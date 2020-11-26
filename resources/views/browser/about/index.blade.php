@php
$about = App\Models\Page::where('name', 'About')->first();
$about = unserialize($about->content);
@endphp

@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<div class="my-auto">
  <div class=" flex justify-center items-center mb-10">
    <h1 class="text-2xl font-bold uppercase">About {{ config('app.name') }}</h1>
  </div>
  <div class="container  mx-auto p-4">
    <div class="flex flex-col">

      <div class="flex justify-center w-full ">
        <div class="max-w-xl about">
          {!! $about !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .swiper-slide {
    text-align: left
  }
</style>
@endpush