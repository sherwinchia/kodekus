@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<div class="home container bg-white mx-auto p-4 pt-12">
  <div class="border-b-2 border-gray-300 mb-2">
    <h1>Terbaru</h1>
  </div>

  <div class="flex flex-col lg:flex-row justify-center mb-4">
    <div class="w-12/12 lg:w-8/12 lg:mr-4 mb-4 lg:mb-0" style="height:24rem;">
      <div class="h-full flex flex-col justify-end rounded-sm"
        style="background-image: url({{ $latestArticles[0]->image_link }}); background-size: cover; background-position: 50%;">
        <div class=" p-4">
          <a class="" href="{{ $latestArticles[0]->article_link }}">
            <h2 class="text-white">{{ $latestArticles[0]->title }}</h2>
            <p class=" text-white mb-2">{{ $latestArticles[0]->description }}</p>
          </a>
          <div class=" flex flex-wrap">
            @foreach ($latestArticles[0]->tags as $tag)
            <a class="w-auto" href="#">
              <div class="tracking-wide p-1 rounded-sm border-2 border-white text-white text-xs mr-2 mb-2">#
                {{ $tag->name }}
              </div>
            </a>
            @endforeach
          </div>
          <div class="mb-2 flex items-center text-white text-sm">
            <span class="">{{ date_to_human($latestArticles[0]->publish_date,'d F Y') }}</span>
            <span class="px-2">|</span>
            <span class="">{{ $latestArticles[0]->read_minutes }}</span>
            <span class="px-2">|</span>
            <span class="">
              <i class="far fa-bookmark"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="w-12/12 lg:w-4/12" style="height:24rem;">
      <div class=" h-full flex flex-col justify-end rounded-sm"
        style="background-image: url({{ $latestArticles[1]->image_link }}); background-size: cover; background-position:50%;">
        <div class=" p-4">
          <a href="{{ $latestArticles[1]->article_link }}">
            <h2 class="text-white">{{ $latestArticles[1]->title }}</h2>
            <p class="block lg:hidden text-white mb-2">{{ $latestArticles[1]->description }}</p>
          </a>
          <div class=" flex flex-wrap">
            @foreach ($latestArticles[1]->tags as $tag)
            <a class="w-auto" href="#">
              <div class="tracking-wide p-1 rounded-sm border-2 border-white text-white text-xs mr-2 mb-2">#
                {{ $tag->name }}
              </div>
            </a>
            @endforeach
          </div>
          <div class="mb-2 flex items-center text-white text-sm">
            <span class="">{{ date_to_human($latestArticles[1]->publish_date,'d F Y') }}</span>
            <span class="px-2">|</span>
            <span class="">{{ $latestArticles[1]->read_minutes }}</span>
            <span class="px-2">|</span>
            <span class="">
              <i class="far fa-bookmark"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col lg:flex-row justify-center mb-4">
    <div class="w-12/12 lg:w-8/12 lg:mr-4">
      @foreach ($latestArticles as $index=>$latestArticle)
      @if ($index > 1)
      <div class="small-post flex mb-4">
        <div class="w-56 h-56 mr-4 rounded-sm" style="background-image: url({{  $latestArticle->image_link }}); background-size: cover; background-position:
      50%;">
        </div>
        <div class="flex-1 info justify-between">
          <a href="{{ $latestArticle->article_link }}">
            <h2 class="title">{{ $latestArticle->title }}</h2>
            <p class="description">{{ $latestArticle->description }}</p>
          </a>
          <div>
            <div class="flex flex-wrap mb-2">
              @foreach ($latestArticle->tags as $tag)
              <a class="w-auto" href="#">
                <div class=" tracking-wide p-1 rounded-sm border-2 border-black text-black text-xs mr-2 mb-2">#
                  {{ $tag->name }}
                </div>
              </a>
              @endforeach
            </div>
            <div class="flex items-center text-black text-sm">
              <span class="">{{ date_to_human( $latestArticle->publish_date,'d F Y') }}</span>
              <span class=" px-2">|</span>
              <span class=" ">{{  $latestArticle->read_minutes }}</span>
              <span class=" px-2">|</span>
              <span class=" ">
                <i class="far fa-bookmark"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach

      {{-- <div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      @foreach ($latestArticles as $index=>$latestArticle)
      @if ($index > 1)
      <div class="swiper-slide small-post flex mb-4">
        <div class="w-56 h-56 mr-4 rounded-sm"
          style="background-image: url({{  $latestArticle->image_link }}); background-size: cover; background-position:
      50%;">
    </div>
    <div class="flex-1 info justify-between">
      <a href="{{ $latestArticle->article_link }}">
        <h2 class="title">{{ $latestArticle->title }}</h2>
        <p class="description">{{ $latestArticle->description }}</p>
      </a>
      <div>
        <div class="flex flex-wrap mb-2">
          @foreach ($latestArticle->tags as $tag)
          <a class="w-auto" href="#">
            <div class=" tracking-wide p-1 rounded-sm border-2 border-black text-black text-xs mr-2 mb-2">#
              {{ $tag->name }}
            </div>
          </a>
          @endforeach
        </div>
        <div class="flex items-center text-black text-sm">
          <span class="">{{ date_to_human( $latestArticle->publish_date,'d F Y') }}</span>
          <span class=" px-2">|</span>
          <span class=" ">{{  $latestArticle->read_minutes }}</span>
          <span class=" px-2">|</span>
          <span class=" ">
            <i class="far fa-bookmark"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endforeach
</div>
<div class="swiper-pagination"></div>
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>

<div class="swiper-scrollbar"></div>
</div> --}}
<div class="border-b-2 border-gray-300 mb-2">
  <h1>Featured</h1>
</div>

</div>

<div class="w-12/12 lg:w-4/12 flex flex-col">
  <div class="mb-8">
    <div class="flex items-center mb-2">
      <h5 class="font-bold text-lg uppercase text-black mr-2">Kategori</h5>
      <i class="fas fa-layer-group"></i>
    </div>

    <div class="flex flex-wrap">
      @foreach ($categories as $category)
      <a href="#" class="w-6/12 border-l-2 p-2 border-gray-600 text-black cursor-pointer text-md hover:bg-gray-200">
        <span>{{ $category->name }}</span>
      </a>
      @endforeach
    </div>

  </div>
  <div class="mb-8">
    <div class="flex items-center mb-2">
      <h5 class="font-bold text-lg uppercase text-black text-sm mr-2">Topik</h5>
      <i class="fas fa-hashtag"></i>
    </div>

    <div class=" flex flex-wrap">
      @foreach ($tags as $tag)
      <a class="w-auto cursor-pointer" href="#">
        <div class="tracking-wide p-1 rounded-sm border-2 border-black text-black text-sm mr-2 mb-2">#
          {{ $tag->name }}
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <div class="mb-8 h-full">
    <div class="sticky top-0">
      <div class="flex items-center">
        <h5 class="font-bold text-lg uppercase text-black mr-2">Subscribe</h5>
        <i class="far fa-newspaper"></i>
      </div>
      <p class="mb-2">
        Dapatkan informasi terbaru dari brand dengan berlangganan newsletter.
      </p>

      <div class="input-group mb-2">
        <label for="name">
          Nama
        </label>
        <input placeholder="John Doe"
          class="text-black bg-gray-100 rounded-t hover:outline-none p-2 w-full border border-gray-500" />
      </div>
      <div class="input-group mb-4">
        <label for="email">
          Email
        </label>
        <input placeholder="john_doe@gmail.com"
          class="text-black bg-gray-100 rounded-t hover:outline-none p-2 w-full border border-gray-500" />
      </div>

      <button type="button" class="px-4 py-2 bg-white border-black border text-black rounded w-full tracking-wide">
        Subscribe
      </button>
    </div>

  </div>
</div>
</div>
</div>
@endsection

@push('styles')
<style>
  .swiper-container {
    width: 100%;
    height: 14rem;
  }
</style>
@endpush