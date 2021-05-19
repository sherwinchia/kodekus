@extends('browser.layouts.master')

@section('meta-content')
    {!! SEOTools::generate() !!}
@endsection

@section('content')
    <div class="container mx-auto p-4">
        <livewire:browser.quiz.quiz-form :quiz="$quiz" />
    </div>
@endsection
