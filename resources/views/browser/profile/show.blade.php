@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')

<livewire:browser.profiles.profile-form user="{{ current_user()->id }}" />

@endsection