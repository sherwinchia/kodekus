@extends('browser.layouts.master')

@section('meta-content')
    {!! SEOTools::generate() !!}
@endsection

@section('content')

    <div class="search container mx-auto p-4">
        <div class="flex flex-col">
            <div class="w-12/12 lg:w-8/12 flex flex-wrap gap-4">
                @foreach ($quizzes as $quiz)
                    <a class="card cursor-pointer" href="{{ route('browser.quizzes.show', $quiz->id) }}">
                        {{ $quiz->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
