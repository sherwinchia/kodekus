@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')

<div class="search container bg-white mx-auto p-4 pt-12">
  <livewire:browser.search.search-component>
</div>

@endsection