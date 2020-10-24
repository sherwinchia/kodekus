@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<livewire:browser.authors.author-component :author="$author" />
@endsection