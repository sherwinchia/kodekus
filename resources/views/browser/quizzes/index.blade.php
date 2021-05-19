@extends('browser.layouts.master')

@section('meta-content')
    {!! SEOTools::generate() !!}
@endsection

@section('content')

    <div class=" container mx-auto p-4">
        <div class=" flex flex-wrap gap-3">
            @foreach ($quizzes as $index => $quiz)
                <a class="cursor-pointer card w-12/12 md:w-1/2 lg:w-3/12"
                    href="{{ route('browser.quizzes.show', $quiz->id) }}">
                    <span class="font-semibold text-xl border-b border-gray-400 pb-2 mb-2 block">{{ $quiz->name }}</span>
                    <div class=" overflow-hidden h-48">
                        {{ $quiz->description }}
                    </div>
                    <div class=" text-right">#{{ $index + 1 }}</div>
                </a>
            @endforeach
        </div>

    </div>

@endsection
