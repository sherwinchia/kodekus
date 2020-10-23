@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')

<div class="search container bg-white mx-auto p-4">
  <div class="flex flex-col">
    @foreach ($series as $_series)
    <h1>{{ $_series->name }}</h1>
    <div class="swiper-container">
      <div class="swiper-wrapper mb-6">
        @foreach ($_series->articles()->latest('publish_date')->get() as $article)
        <div class="swiper-slide">
          <div class="article-md p-2">
            <img src="{{ $article->image_link }}" class="rounded" alt="technology" />
            <div class=" info">
              <a class="h-24 overflow-hidden mb-2" href="{{ $article->article_link }}">
                <p class="title font-semibold">{{ $article->title }}</p>
                <p class="description">{{ $article->description }}</p>
              </a>
              <div class="flex flex-wrap">
                @foreach ($article->tags as $tag)
                <a class="w-auto" href="{{ $tag->tag_link }}">
                  <div class="py-1 px-2 text-sm rounded-sm border border-black mr-2 mb-2"># {{ $tag->name }}</div>
                </a>
                @endforeach
              </div>
              <div class="extra">
                <div class="mb-2 flex items-center">
                  <span>{{ date_to_human($article->publish_date,'d F') }}</span>
                  <span class="px-2"> | </span>
                  <span>{{ $article->read_minutes }}</span>
                  <span class=" px-2">|</span>
                  <livewire:browser.partials.bookmark-component :bookmarkableId="$article->id" :key="$article->id" />
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
    @endforeach
  </div>
</div>


@endsection

@push('styles')
<style>
  .swiper-slide {
    text-align: left
  }
</style>
@endpush