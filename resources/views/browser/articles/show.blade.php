@extends('browser.layouts.master')

@section('meta-content')
{!! SEOMeta::generate() !!}
@endsection

{{-- @section('breadcrumbs')
{{ Breadcrumbs::render('admin.roles.index') }}
@endsection --}}

@section('content')
<div class="container mx-auto pt-20" x-data="articleData()" x-init="init()">

  <div class="flex justify-center">
    <div class="w-8/12">
      <div class="title mb-4">
        <h1 class="text-center py-4">{{ $article->title }}</h1>
        <div class="text-center py-4 text-gray-800 font-light">
          <span>by</span> <span class="font-medium">{{ $article->author->name ?? 'Anonymous' }}</span>
          <span class="px-2">|</span>
          <span class="">{{ date_to_human($article->publish_date,'d F Y') }}</span>
          <span class="px-2">|</span>
          <span class="" id="reading-minutes" x-text="readingMinutes"></span>
        </div>
        <p class="text-lg font-semibold text-gray-800 py-4">{{ $article->description }}</p>
      </div>
    </div>
  </div>

  <div class="flex justify-center">
    <div class="left hidden lg:block w-2/12 ">
      <div class="flex-col sticky top-0">
        <div class="text-center text-2xl py-2"><i class="far fa-heart"></i></div>
        <div class="text-center text-2xl py-2"><i class="far fa-comment"></i></div>
        <div class="text-center text-2xl py-2"><i class="far fa-bookmark"></i></div>
      </div>
    </div>

    <div class="center w-8/12">
      {{-- {{ dd($article) }} --}}

      {{-- {{ dd($article->body->blocks) }} --}}
      @foreach ($article->body->blocks as $section)
      @if ($section->type == 'header')
      @if ($section->data->level == 1)
      <h1 class="text-6xl">{{ $section->data->text }}</h1>
      @elseif ($section->data->level == 2)
      <h2 class="text-5xl">{{ $section->data->text }}</h2>
      @elseif ($section->data->level == 3)
      <h3 class="text-4xl">{{ $section->data->text }}</h3>
      @elseif ($section->data->level == 4)
      <h4 class="text-3xl">{{ $section->data->text }}</h4>
      @elseif ($section->data->level == 5)
      <h5 class="text-2xl">{{ $section->data->text }}</h5>
      @elseif ($section->data->level == 6)
      <h6 class="text-xl">{{ $section->data->text }}</h6>
      @endif

      @elseif ($section->type == 'paragraph')
      <div>
        <p class="">{!! $section->data->text !!}</p>
      </div>

      @elseif ($section->type == 'embed')
      <div class="iframe-container">
        <iframe class="responsive-iframe" src="{{ $section->data->embed }}"></iframe>
      </div>
      @if ($section->data->caption)
      <label class="text-md text-gray-700 italic" for="video-caption">{{ $section->data->caption }}</label>
      @endif

      @elseif ($section->type == 'delimiter')
      <div class="text-2xl text-center py-6">
        • • •
      </div>

      @elseif ($section->type == 'code')
      <div>
        <pre>
          <code>
{{ $section->data->code }}
          </code>
        </pre>
      </div>

      @elseif ($section->type == 'raw')
      <div>
        {!! $section->data->html !!}
      </div>

      @elseif ($section->type == 'image')
      <div>
        <img src="{{ $section->data->url }}" alt="{{ $section->data->caption ?? '' }}">
      </div>

      @elseif ($section->type == 'quote')
      <blockquote class="border-l p-6 my-4">
        <p>{!! $section->data->text !!}</p>
        <p class="font-bold text-right">{!! '- ' . $section->data->caption !!}</p>
      </blockquote>

      @elseif ($section->type == 'warning')
      <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
        <p class="font-bold">{!! $section->data->title !!}</p>
        <p>{!! $section->data->message !!}</p>
      </div>

      @endif
      @endforeach
    </div>

    <div class="right hidden lg:block w-2/12">
      <div class="flex-col sticky top-0">
        <div class="text-center text-2xl py-2">ADS AREA</div>
      </div>
    </div>
  </div>

  <div class="flex bg-yellow-200 py-4">
    <div class="w-12/12">
      More artcle
    </div>
  </div>
</div>


@endsection

@push('styles')
<style>
  .iframe-container {
    position: relative;
    overflow: hidden;
    width: 100%;
    padding-top: 56.25%;
  }

  .responsive-iframe {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    min-width: 100%;
    height: 100%;
  }
</style>
@endpush

@section('scripts')
<script>
  function articleData(){
    return{
      //data
      readingMinutes: null,
      //function

      init(){
        let body = {!! json_encode($article->body->blocks) !!};
        body = JSON.stringify(body);
        let words = body.split(" ").length;
        let wordsPerMinute = 200;
        let minutes = Math.ceil(words / wordsPerMinute);
        
        this.readingMinutes = minutes <= 1 ? `${minutes} minute` : `${minutes} minutes`;
      }
    }
  }

  window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}

</script>
@endsection