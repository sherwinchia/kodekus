@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')

<div class="search container mx-auto p-4">
  <div class="flex flex-col">
    <div class="w-12/12 lg:w-8/12">
      <livewire:browser.search.search-component>
    </div>
    {{-- <div class="w-3/12">
    </div> --}}
  </div>
</div>

@endsection