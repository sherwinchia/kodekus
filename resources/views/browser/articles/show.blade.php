@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<div class="container mx-auto article-show">
  <div class="flex justify-center mb-4">
    <div class="center w-11/12 lg:w-6/12 xl:w-6/12">
      <div class="title mb-4">
        <h1 class="text-left py-4">{{ $article->title }}</h1>
        <img src="{{ $article->image_link }}" alt="">
        <div class="text-left py-4 text-black font-light">
          <span>by</span> <span class="font-medium"><a
              href="{{ $article->author_link }}">{{ $article->author->full_name ?? 'Anonymous' }}</a></span>
          <span class="px-2">|</span>
          <span class="">{{ date_to_human($article->publish_date,'d F Y') }}</span>
          <span class="px-2">|</span>
          <span class="">{{ $article->read_minutes }}</span>
        </div>
        <p class="text-lg font-light text-black py-4">{{ $article->description }}</p>
      </div>
    </div>
  </div>

  <div class="flex justify-center mb-4">
    <div class="left hidden lg:block w-3/12 px-4 ">
      <div class="flex flex-col h-full">
        <div class="action flex-1 ">
          <div class="left-sticky flex flex-col items-center text-gray-800 text-xl">
            <div class="py-2">
              <livewire:browser.partials.like-component :likeableId="$article->id" :counter="true" />
            </div>
            {{-- <div class="text-center py-2"><i class="far fa-comment"></i></div> --}}
            <div class="py-2">
              <livewire:browser.partials.bookmark-component :bookmarkableId="$article->id" />
            </div>
          </div>
        </div>
        <div class="share flex-1 my-20">
          <div class="left-sticky flex flex-col items-center text-gray-800">
            <div class="mb-2 font-semibold">
              <label class="">Share</label>
            </div>
            <a href="{{ $article->share['facebook'] }}" target="_blank">
              <div class="social-container">
                <i class="fab fa-facebook-f text-sm"></i>
              </div>
            </a>

            <a href="{{ $article->share['twitter'] }}" target="_blank">
              <div class="social-container">
                <i class="fab fa-twitter text-sm"></i>
              </div>
            </a>

            <a href="{{ $article->share['linkedin'] }}" target="_blank">
              <div class="social-container">
                <i class="fab fa-linkedin-in text-sm"></i>
              </div>
            </a>

            <a href="{{ $article->share['whatsapp'] }}" target="_blank">
              <div class="social-container">
                <i class="fab fa-whatsapp text-sm"></i>
              </div>
            </a>

          </div>
        </div>
      </div>


    </div>

    <div class="center w-11/12 lg:w-6/12 xl:w-6/12">
      @foreach ($article->body->blocks as $section)
      @if ($section->type == 'header')
      @if ($section->data->level == 1)
      <h1 class="text-6xl mb-4">{{ $section->data->text }}</h1>
      @elseif ($section->data->level == 2)
      <h2 class="text-5xl mb-4">{{ $section->data->text }}</h2>
      @elseif ($section->data->level == 3)
      <h3 class="text-4xl mb-4">{{ $section->data->text }}</h3>
      @elseif ($section->data->level == 4)
      <h4 class="text-3xl mb-4">{{ $section->data->text }}</h4>
      @elseif ($section->data->level == 5)
      <h5 class="text-2xl mb-4">{{ $section->data->text }}</h5>
      @elseif ($section->data->level == 6)
      <h6 class="text-xl mb-4">{{ $section->data->text }}</h6>
      @endif

      @elseif ($section->type == 'paragraph')
      <div class="">
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
      <div class="text-2xl text-center py-6">
        • • •
      </div>

      @elseif ($section->type == 'code')
      <div class="">
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
      <blockquote class="border-l-2 border-gray-700 p-6 my-4">
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

      <div class="post-tag mb-8 flex flex-wrap">
        @foreach ($article->tags as $tag)
        <a class="w-auto" href="#">
          <div class="py-1 px-2 text-sm rounded-sm border border-black mr-2 mb-2"># {{ $tag->name }}</div>
        </a>
        @endforeach
      </div>

      <div class="post-action flex justify-between items-center pb-4">
        <div class="flex text-gray-800">
          <div class="mr-4 flex items-center">
            <livewire:browser.partials.like-component :likeableId="$article->id" :key="$article->id" :label="'likes'" />
          </div>
          {{-- <div class="mr-4 flex items-center">
            <i class="text-xl p-1 px-2 far fa-comment"></i>
            <span class="ml-2">comments</span>
          </div> --}}
          <div class="mr-4 flex items-center">
            <div class="text-xl">
              <livewire:browser.partials.bookmark-component :bookmarkableId="$article->id" :label="'bookmark'" />
            </div>
          </div>
        </div>
        <div class="flex text-gray-800">
          <a class="pl-4" href="{{ $article->share['facebook'] }}" target="_blank">
            <i class="text-lg fab fa-facebook-square"></i>
          </a>
          <a class="pl-4" href="{{ $article->share['twitter'] }}" target="_blank">
            <i class="text-lg fab fa-twitter"></i>
          </a>
          <a class="pl-4" href="{{ $article->share['linkedin'] }}" target="_blank">
            <i class="text-lg fab fa-linkedin"></i>
          </a>
          <a class="pl-4" href="{{ $article->share['whatsapp'] }}" target="_blank">
            <i class="text-lg fab fa-whatsapp-square"></i>
          </a>
        </div>
      </div>

      @if (isset($article->prev_article) || isset($article->next_article))
      <div class="post-navigation flex justify-between items-center pt-4 border-t">
        <div>
          @if (isset($article->prev_article))
          <a href="{{ $article->prev_article->link }}">
            <div class="flex items-center">
              <svg class="h-5 w-5 mr-2 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512"
                style="enable-background:new -49 141 512 512;" xml:space="preserve">
                <path id="XMLID_10_"
                  d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z">
                </path>
              </svg>
              Prev
            </div>
          </a>
          @endif
        </div>
        <div>
          @if (isset($article->next_article))
          <a href="{{ $article->next_article->link }}">
            <div class="flex items-center">
              Next
              <svg class="h-5 w-5 ml-2 fill-current" clasversion="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512"
                style="enable-background:new -49 141 512 512;" xml:space="preserve">
                <path id="XMLID_11_" d="M-24,422h401.645l-72.822,72.822c-9.763,9.763-9.763,25.592,0,35.355c9.763,9.764,25.593,9.762,35.355,0
                l115.5-115.5C460.366,409.989,463,403.63,463,397s-2.634-12.989-7.322-17.678l-115.5-115.5c-9.763-9.762-25.593-9.763-35.355,0
                c-9.763,9.763-9.763,25.592,0,35.355l72.822,72.822H-24c-13.808,0-25,11.193-25,25S-37.808,422-24,422z" />
              </svg>
            </div>
          </a>
          @endif
        </div>
      </div>
      @endif
    </div>

    <div class="right hidden lg:block w-3/12 px-4">
      {{-- <div class="flex flex-col h-full">
        <div class="flex-1"></div>
        @if (isset($article->next_article))
        <div class="flex-1">
          <div class="right-sticky next-article text-center">
            <img class="mx-auto" src="{{ $article->next_article->image_link }}" alt="">
      <div class="info">
        <p class="title">{{ $article->next_article->title }}</p>
        <a href="{{ $article->next_article->link }}">
          <div class="flex justify-center items-center">
            Read Next
            <svg class="h-5 w-5 ml-2 fill-current" clasversion="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512"
              style="enable-background:new -49 141 512 512;" xml:space="preserve">
              <path id="XMLID_11_" d="M-24,422h401.645l-72.822,72.822c-9.763,9.763-9.763,25.592,0,35.355c9.763,9.764,25.593,9.762,35.355,0
                l115.5-115.5C460.366,409.989,463,403.63,463,397s-2.634-12.989-7.322-17.678l-115.5-115.5c-9.763-9.762-25.593-9.763-35.355,0
                c-9.763,9.763-9.763,25.592,0,35.355l72.822,72.822H-24c-13.808,0-25,11.193-25,25S-37.808,422-24,422z" />
            </svg>
          </div>
        </a>
      </div>
    </div>
  </div>
  @endif
</div> --}}
</div>
</div>

<div class="flex justify-center">
  <div class="w-11/12 lg:w-6/12 article-comments ">
    <livewire:browser.partials.comment-component :article="$article" />
  </div>
</div>

<div class="flex justify-center">
  <div class="w-11/12 lg:w-12/12 xl:w-12/12">
    <div class="border-b border-gray-300 mb-4 font-semibold text-xl py-2">
      <label>Artikel Lain</label>
    </div>
    <div class="block space-x-0 lg:flex lg:space-x-6">
      <livewire:browser.articles.articles-display-medium :articles="$article->more_articles" />
    </div>
  </div>
</div>
</div>
@endsection