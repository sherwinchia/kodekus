@extends('admin.layouts.master')

@section('meta-content')
    <title>Dashboard &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.dashboard.index') }}
@endsection

@section('content')
    <div class="p-4 flex flex-col">
        <div class="flex flex-wrap gap-4 overflow-hidden mb-4">
            <div
                class=" bg-white shadow-md my-1 w-full overflow-hidden md:w-1/2 lg:w-1/3 xl:w-1/4 rounded-lg py-2 px-4 flex items-center align-middle">
                <div class="border border-gray-300 rounded-full h-16 w-16 flex items-center justify-center my-2">
                    <i class=" text-lg far fa-newspaper"></i>
                </div>
                <div class="flex flex-col ml-3">
                    <span class="text-sm">Total Article</span>
                    <span><b>{{ $articlesTotal }}</b></span>
                </div>
            </div>

            <div
                class=" bg-white shadow-md my-1 w-full overflow-hidden md:w-1/2 lg:w-1/3 xl:w-1/4 rounded-lg py-2 px-4 flex items-center align-middle">
                <div class="border border-gray-300 rounded-full h-16 w-16 flex items-center justify-center my-2">
                    <i class=" text-lg far fa-user"></i>
                </div>
                <div class="flex flex-col ml-3">
                    <span class="text-sm">Total User</span>
                    <span><b>{{ $usersTotal }}</b></span>
                </div>
            </div>
            <div
                class=" bg-white shadow-md my-1 w-full overflow-hidden md:w-1/2 lg:w-1/3 xl:w-1/4 rounded-lg py-2 px-4 flex items-center align-middle">
                <div class="border border-gray-300 rounded-full h-16 w-16 flex items-center justify-center my-2">
                    <i class=" text-lg far fa-comment"></i>
                </div>
                <div class="flex flex-col ml-3">
                    <span class="text-sm">Pending Comment</span>
                    <span><b>{{ $pendingCommentsTotal }}</b></span>
                </div>
            </div>

        </div>

        <div class="flex gap-4">
            <div class="bg-white shadow-md rounded-lg w-full flex flex-col space-y-2 p-4">
                <div><b>Recent Articles</b></div>
                @foreach ($latestArticles as $article)
                <a class="w-full" href="{{ route('admin.articles.edit', $article->id) }}">
                    <div class="w-full rounded-md border border-gray-300 p-2">
                            {{ $article->title }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>


    </div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection
