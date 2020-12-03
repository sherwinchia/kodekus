@extends('browser.layouts.auth')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<livewire:browser.auth.activate-account />
@endsection