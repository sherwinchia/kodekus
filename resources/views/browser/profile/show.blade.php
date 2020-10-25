@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<div class="container mx-auto author-show">
  {{-- <div class="relative h-48 bg-green-300 flex flex-col align-middle items-center justify-center">
    <div class="author-profile rounded-full h-32 w-32 bg-white flex items-center justify-center">
      Profile Pict
    </div>
  </div> --}}
  <div class="flex flex-col justify-center">
    <div class="flex">
      <div class="w-1/3">
        <div class="flex items-center border-b border-black mb-6">
          <i class="fas fa-bookmark mr-2"></i>
          <h5 class="font-bold text-lg uppercase text-black">Bookmark</h5>
        </div>
        @foreach (current_user()->bookmarks as $bookmark)
        {{-- <livewire:browser.articles.article-display-small :article="$bookmark->bookmarkable"
          :key="$bookmark->bookmarkable->id" /> --}}
        <livewire:browser.bookmarks.bookmark-display :bookmarkable="$bookmark->bookmarkable"
          :key="$bookmark->bookmarkable->id" />
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection