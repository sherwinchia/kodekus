@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<div class="home container mx-auto p-4 pt-12">
  <div class="border-b-2 border-gray-300 mb-2">
    <h1>Latest Articles</h1>
  </div>

  <div class="flex flex-col lg:flex-row justify-center mb-4">
    <div class="w-12/12 lg:w-8/12 lg:mr-4 mb-4 lg:mb-0" style="height:24rem;">
      <div class="h-full flex flex-col justify-end p-4"
        style="background-image: url({{ $latestArticles[0]->image_link }}); background-size: cover; background-position: 50%;">
        <a class="" href="{{ $latestArticles[0]->article_link }}">
          <h2 class="text-white">{{ $latestArticles[0]->title }}</h2>
          <p class=" text-white mb-2">{{ $latestArticles[0]->description }}</p>
        </a>
        <div class=" flex flex-wrap">
          @foreach ($latestArticles[0]->tags as $tag)
          <a class="w-auto" href="#">
            <div class="p-1 rounded-sm border-2 border-gray-400 text-white text-xs mr-2 mb-2">#
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
    <div class="w-12/12 lg:w-4/12" style="height:24rem;">
      <div class=" h-full flex flex-col justify-end p-4"
        style="background-image: url({{ $latestArticles[1]->image_link }}); background-size: cover; background-position:50%;">
        <a href="{{ $latestArticles[1]->article_link }}">
          <h2 class="text-white">{{ $latestArticles[1]->title }}</h2>
          <p class="block lg:hidden text-white mb-2">{{ $latestArticles[1]->description }}</p>
        </a>
        <div class=" flex flex-wrap">
          @foreach ($latestArticles[1]->tags as $tag)
          <a class="w-auto" href="#">
            <div class="p-1 rounded-sm border-2 border-gray-400 text-white text-xs mr-2 mb-2">#
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

  <div class="flex flex-col lg:flex-row justify-center mb-4">
    <div class="w-12/12 lg:w-8/12 lg:mr-4">
      @foreach ($latestArticles as $index=>$latestArticle)
      @if ($index > 1)
      <div class="small-post flex mb-4">
        <div class="w-56 h-48 mr-4"
          style="background-image: url({{  $latestArticle->image_link }}); background-size: cover; background-position: 50%;">
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
                <div class="p-1 rounded-sm border-2 border-black text-black text-xs mr-2">#
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

    <div class="w-12/12 lg:w-4/12 flex flex-col">
      <div class="mb-8">
        <h5 class="font-bold text-lg uppercase text-black underline">Kategori</h5>
        <ul>
          @foreach ($categories as $category)
          <li class="py-2 border-b">
            <a href="#" class="flex items-center text-black cursor-pointer">
              <span>{{ $category->name }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="mb-8">
        <h5 class="font-bold text-lg uppercase text-black mb-2 underline">Topik</h5>
        <div class=" flex flex-wrap">
          @foreach ($tags as $tag)
          <a class="w-auto cursor-pointer" href="#">
            <div class="p-1 rounded-sm border-2 border-black text-black text-xs mr-2">#
              {{ $tag->name }}
            </div>
          </a>
          @endforeach
        </div>
      </div>
      <div class="flex-1 mb-8">
        <h5 class="font-bold text-lg uppercase text-black mb-2 underline">Subscribe</h5>
        <p class="text-black">
          Subscribe to our newsletter. We deliver the best health related articles to your inbox
        </p>
        <input placeholder="your email address"
          class="text-gray-700 bg-gray-100 rounded-t hover:outline-none p-2 w-full mt-4 border" />
        <button class="px-4 py-2 bg-indigo-600 text-gray-200 rounded-b w-full capitalize tracking-wide">
          Subscribe
        </button>
      </div>
    </div>
  </div>
</div>
@endsection