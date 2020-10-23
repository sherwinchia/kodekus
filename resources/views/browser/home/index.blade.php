@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<livewire:browser.home.home-component />
@endsection

@push('styles')
@endpush