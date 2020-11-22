@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')

<div class="search container mx-auto p-4">
  <div class="flex flex-col">
    @foreach ($series as $_series)
    <h1 class="p-2 text-lg font-semibold">{{ $_series->name }}</h1>
    <div class="swiper-container">
      <div class="swiper-wrapper mb-6">
        @foreach ($_series->articles()->where('published', 1)->latest('publish_date')->get() as $article)
        <div class="swiper-slide">
          <div class="article-md p-2">
            <img src="{{ $article->image_link }}" class="rounded" alt="technology" />
            <div class=" info">

              <a class="h-24 overflow-hidden mb-2" href="{{ $article->article_link }}">
                <p class="title">{{ $article->title }}</p>
                <p class="description">{{ $article->description }}</p>
              </a>
              <div class="flex flex-wrap">
                @foreach ($article->tags as $tag)
                <a class="w-auto" href="{{ $tag->tag_link }}">
                  <div class="py-1 px-2 rounded-sm border border-black text-black text-xs mr-2 mb-2">#
                    {{ $tag->name }}</div>
                </a>
                @endforeach
              </div>
              <div class="extra flex justify-between">
                <div class="flex items-center text-gray-700 font-light text-sm space-x-4">
                  {{-- <span><a class="text-black font-normal" href="{{ $article->author->author_link }}"><i
                    class="pr-2 far fa-user"></i>{{ $article->author->full_name }}</a></span> --}}
                  <span class=""><i
                      class="pr-2 far fa-calendar-alt"></i>{{ date_to_human( $article->publish_date,'F d') }}</span>
                  {{-- <span class=""><i class="pr-2 far fa-clock"></i>{{  $article->read_minutes }}</span> --}}
                </div>
                <div>
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