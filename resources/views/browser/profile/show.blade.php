@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<div class="container mx-auto author-show">
  <div class="relative h-48 bg-green-300 flex flex-col align-middle items-center justify-center">
    <div class="author-profile rounded-full h-32 w-32 bg-white flex items-center justify-center">
      Profile Pict
    </div>
  </div>
  <div class="pt-20 flex flex-col justify-center">
    <div class="mt-10 flex">
      <div class="w-2/3">
        {{-- @foreach ($author->articles as $article)
        <livewire:browser.articles.article-display-small :article="$article" :key="$article->id" />
        @endforeach --}}
      </div>
      <div class="w-1/3 border border-black">
        <div class="text-center text-xl font-semibold">{{ current_user()->full_name }}</div>
        <div class="text-center">Joined at {{ date_to_human(current_user()->created_at, 'F y') }}</div>
      </div>
    </div>
  </div>
</div>
@endsection