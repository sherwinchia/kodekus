@extends('admin.layouts.master')

@section('meta-content')
    <title>Quiz &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.quizzes.edit', $quiz) }}
@endsection

@section('content')
    <div class="flex-1 flex flex-col p-8">
        <livewire:admin.quizzes.quizzes-form :quiz="$quiz" />
    </div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection
