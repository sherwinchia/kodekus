@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')

<div class="search container bg-white mx-auto p-4 pt-12 mt-10">
  <div class="flex flex-col">
    <div class="w-full sm:w-9/12">
      <livewire:browser.search.search-component>
    </div>
    <div class="w-3/12">
    </div>
  </div>
</div>

@endsection