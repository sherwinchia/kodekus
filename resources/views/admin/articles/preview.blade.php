@extends('browser.layouts.master')

@section('meta-content')
<title>Preview Article &middot; Kodekus</title>
@endsection

@section('content')
<div class="container mx-auto article-show mt-4 sm:mt-10">
  <div class="flex justify-center mb-4">
    <div class="center w-11/12 lg:w-6/12 xl:w-6/12">
      <div class="">
        <img style="border-radius: 5px;" class="mb-4" src="{{ $article->image_link }}" alt="">
        <h1 class="text-left mb-2 font-semibold text-3xl lg:text-4xl xl:text-5xl">
          {{ $article->title }}</h1>

        <div class="flex flex-col lg:flex-row lg:items-center lg:mb-4 lg:space-x-4">
          <div class="flex items-center align-middle space-x-2 mb-4 lg:mb-0">
            <div class="rounded-full h-10 w-10 bg-white flex items-center justify-center" style="background-image: url({{  $article->author->profile->image_link }}); background-size: cover; background-position:
              50%;">
            </div>
            <div>
              <a class="text-normal" href="#">
                {{ $article->author->full_name }}
              </a>
            </div>
          </div>
          <div class="flex items-center space-x-2 mb-4 lg:mb-0">
            <span class="text-xs lg:text-sm mr-2">
              <i class=" far fa-calendar-alt"></i>
              {{ date_to_human( $article->publish_date,'F d') }}
            </span>
            <span class="text-xs lg:text-sm">
              <i class=" far fa-clock"></i>
              {{  $article->read_minutes }}
            </span>
          </div>
        </div>

        {{-- <p class="text-md ">{{ $article->description }}</p> --}}
      </div>
    </div>
  </div>

  <div class="flex justify-center mb-4">
    <div class="left hidden lg:block w-3/12 px-4 ">
      <div class="flex flex-col h-full">

      </div>


    </div>
    <div id="" class="center w-11/12 lg:w-6/12 xl:w-6/12">
      <div id="article-body">
        @foreach ($article->body->blocks as $section)
        @if ($section->type == 'header')
        @if ($section->data->level == 1)
        <h1 class="text-6xl mb-2 font-semibold">{!! $section->data->text !!}</h1>
        @elseif ($section->data->level == 2)
        <h2 class="text-5xl mb-2 font-semibold">{!! $section->data->text !!}</h2>
        @elseif ($section->data->level == 3)
        <h3 class="text-4xl mb-2 font-semibold">{!! $section->data->text !!}</h3>
        @elseif ($section->data->level == 4)
        <h4 class="text-2xl mb-2 font-semibold">{!! $section->data->text !!}</h4>
        @elseif ($section->data->level == 5)
        <h5 class="text-xl mb-2 font-semibold">{!! $section->data->text !!}</h5>
        @elseif ($section->data->level == 6)
        <h6 class="mb-2 font-semibold">{!! $section->data->text !!}</h6>
        @endif

        @elseif ($section->type == 'paragraph')
        <div class="mb-4 text-md">
          <p class="">{!! $section->data->text !!}</p>
        </div>

        @elseif ($section->type == 'embed')
        <div class="iframe-container mb-4">
          <iframe class="responsive-iframe" src="{{ $section->data->embed }}"></iframe>
          @if ($section->data->caption)
          <label class="text-md text-gray-700 italic" for="video-caption">{{ $section->data->caption }}</label>
          @endif
        </div>


        @elseif ($section->type == 'delimiter')
        <div class="text-2xl text-center mb-4">
          • • •
        </div>

        @elseif ($section->type == 'code')
        <div class="">
          <pre style="margin-top: -1.8rem; margin-bottom: -1.8rem; ">
            <code style="padding:0 1.4rem 0 1.4rem; border-radius:5px;" class="text-sm">
{{ $section->data->code }}
            </code>
          </pre>
        </div>

        @elseif ($section->type == 'raw')
        <div class="mb-4">
          {!! $section->data->html !!}
        </div>

        @elseif ($section->type == 'image')
        <div class="mb-4">
          <figure>
            <img style="border-radius:5px;" src="{{ $section->data->url }}" alt="{{ $section->data->caption ?? '' }}">
            <figcaption class="text-center font-light italic">{{ $section->data->caption ?? '' }}</figcaption>
          </figure>
        </div>

        @elseif ($section->type == 'quote')
        <blockquote class="border-l-2 border-black p-3 mb-4">
          <p>{!! $section->data->text !!}</p>
          <p class="font-bold text-right mt-4">{!! '- ' . $section->data->caption !!}</p>
        </blockquote>

        @elseif($section->type == 'list')
        <div class="pl-4  mb-4">
          @if ($section->data->style == 'ordered')
          <ol class="list-decimal">
            @foreach ($section->data->items as $list)
            <li>{!! $list !!}</li>
            @endforeach
          </ol>
          @else
          <ul class="list-disc">
            @foreach ($section->data->items as $list)
            <li>{!! $list !!}</li>
            @endforeach
          </ul>
          @endif
        </div>


        @elseif ($section->type == 'alert')
        @if ($section->data->type == 'primary')
        <div class="bg-blue-100 rounded-sm border border-blue-500 text-blue-700 p-4 mb-4" role="alert">
          <p>{!! $section->data->message !!}</p>
        </div>

        @elseif ($section->data->type == 'info')
        <div class="bg-purple-100 rounded-sm border border-purple-500 text-purple-700 p-4 mb-4" role="alert">
          <p>{!! $section->data->message !!}</p>
        </div>

        @elseif ($section->data->type == 'success')
        <div class="bg-green-100 rounded-sm border-green-500 border  text-green-700 p-4 mb-4" role="alert">
          <p>{!! $section->data->message !!}</p>
        </div>

        @elseif ($section->data->type == 'warning')
        <div class="bg-orange-100 rounded-sm border-orange-500 border  text-orange-700 p-4 mb-4" role="alert">
          <p>{!! $section->data->message !!}</p>
        </div>

        @elseif ($section->data->type == 'dark')
        <div class="bg-gray-700 rounded-sm border border-gray-800 text-gray-100 p-4 mb-4" role="alert">
          <p>{!! $section->data->message !!}</p>
        </div>

        @elseif ($section->data->type == 'light')
        <div class="bg-gray-100 rounded-sm border border-gray-300 text-gray-900 p-4 mb-4" role="alert">
          <p>{!! $section->data->message !!}</p>
        </div>

        @elseif ($section->data->type == 'danger')
        <div class="bg-red-100 rounded-sm border border-red-500 text-red-700 p-4 mb-4" role="alert">
          <p>{!! $section->data->message !!}</p>
        </div>
        @endif
        @endif
        @endforeach
      </div>

      <div class="post-tag mb-8 flex flex-wrap">
        @foreach ($article->tags as $tag)
        <a class="w-auto" href="#">
          <div class="py-1 px-2 text-sm rounded-sm border border-black mr-2 mb-2"># {{ $tag->name }}</div>
        </a>
        @endforeach
      </div>


    </div>

    <div class="right hidden lg:block w-3/12 px-4">

    </div>

  </div>

</div>
@endsection