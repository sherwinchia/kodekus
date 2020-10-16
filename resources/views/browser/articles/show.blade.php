@extends('browser.layouts.master')

@section('meta-content')
{!! SEOMeta::generate() !!}
@endsection

{{-- @section('breadcrumbs')
{{ Breadcrumbs::render('admin.roles.index') }}
@endsection --}}

@section('content')
<div class="container mx-auto pt-12 article-show" x-data="articleData()" x-init="init()">
  <div class="flex justify-center mb-4">
    <div class="center w-10/12 lg:w-6/12 xl:w-6/12">
      <div class="title mb-4">
        <h1 class="text-left py-4">{{ $article->title }}</h1>
        <div class="text-left py-4 text-gray-800 font-light">
          <span>by</span> <span class="font-medium">{{ $article->author->name ?? 'Anonymous' }}</span>
          <span class="px-2">|</span>
          <span class="">{{ date_to_human($article->publish_date,'d F Y') }}</span>
          <span class="px-2">|</span>
          <span class="" id="reading-minutes" x-text="readingMinutes"></span>
        </div>
        {{-- <p class="text-lg font-semibold text-gray-800 py-4">{{ $article->description }}</p> --}}
      </div>
    </div>
  </div>

  <div class="flex justify-center mb-10">
    <div class="left hidden lg:block w-3/12 px-4 ">
      <div class="flex flex-col h-full">
        <div class="share flex-1">
          <div class="left-sticky flex flex-col items-center text-gray-800">
            <div class="mb-2 font-semibold">
              <label class="">Share</label>
            </div>
            <a href="{{ $article->share['facebook'] }}" target="_blank">
              <div class="social-container">
                <i class="fab fa-facebook-f"></i>
              </div>
            </a>

            <a href="{{ $article->share['twitter'] }}" target="_blank">
              <div class="social-container">
                <i class="fab fa-twitter"></i>
              </div>
            </a>

            <a href="{{ $article->share['linkedin'] }}" target="_blank">
              <div class="social-container">
                <i class="fab fa-linkedin-in"></i>
              </div>
            </a>

            <a href="{{ $article->share['whatsapp'] }}" target="_blank">
              <div class="social-container">
                <i class="fab fa-whatsapp"></i>
              </div>
            </a>

          </div>
        </div>

        <div class="action flex-1 my-20">
          <div class="left-sticky flex flex-col items-center text-gray-800">
            <div class="text-center text-xl py-2"><i class="far fa-heart"></i></div>
            <div class="text-center text-xl py-2"><i class="far fa-comment"></i></div>
            <div class="text-center text-xl py-2"><i class="far fa-bookmark"></i></div>
          </div>
        </div>
      </div>


    </div>

    <div class="center w-10/12 lg:w-6/12 xl:w-6/12">
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
      <div class="mb-8">
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
          <div class="p-2 rounded-sm border border-gray-400 mr-2 mb-2">{{ $tag->name }}</div>
        </a>
        @endforeach
      </div>

      <div class="post-action flex justify-between items-center pb-4 border-b">
        <div class="flex text-gray-800">
          <div class="mr-4 flex items-center">
            <i class="text-2xl far fa-heart"></i>
            <span class="ml-2">likes</span>
          </div>
          <div class="mr-4 flex items-center">
            <i class="text-2xl far fa-comment"></i>
            <span class="ml-2">comments</span>
          </div>
        </div>
        <div class="flex text-gray-800">
          <a class="pl-4" href="{{ $article->share['facebook'] }}" target="_blank">
            <i class="text-xl fab fa-facebook-square"></i>
          </a>
          <a class="pl-4" href="{{ $article->share['twitter'] }}" target="_blank">
            <i class="text-xl fab fa-twitter"></i>
          </a>
          <a class="pl-4" href="{{ $article->share['linkedin'] }}" target="_blank">
            <i class="text-xl fab fa-linkedin"></i>
          </a>
          <a class="pl-4" href="{{ $article->share['whatsapp'] }}" target="_blank">
            <i class="text-xl fab fa-whatsapp-square"></i>
          </a>
        </div>
      </div>

      <div class="post-navigation flex justify-between items-center pt-4">
        <a href="">
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
        <a href="">
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
      </div>
    </div>

    <div class="right hidden lg:block w-3/12 px-4">
      <div class="flex flex-col h-full">
        <div class="flex-1"></div>
        <div class="flex-1">
          <div class="right-sticky subscribe-newsletter text-center">
            <img class="mx-auto"
              src="https://images.unsplash.com/photo-1526666923127-b2970f64b422?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60"
              alt="">
            <div class="info">
              <p class="title">This is title</p>
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
            </div>
          </div>
        </div>
        <div class="flex-1"></div>
      </div>
    </div>
  </div>

  <div class="flex justify-center">
    <div class="w-12/12">
      <div class="border-b border-gray-300 mb-4 font-semibold text-xl py-2">
        <label>More Post</label>
      </div>
      <div class="block space-x-0 lg:flex lg:space-x-6">

        <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0 more-posts">
          <img
            src="https://images.unsplash.com/photo-1526666923127-b2970f64b422?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60"
            class="rounded" alt="technology" />
          <div class=" info">
            <p class="title">Put all speaking her delicate recurred possible. Put all speaking her delicate recurred
              possible.</p>
            <p class="extra">
              <span>{{ date_to_human($article->publish_date,'d F Y') }}</span>
              <span> | </span>
              <span x-text="readingMinutes"></span>
            </p>
          </div>
        </div>

        <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0 more-posts">
          <img src="https://www.benq.com/content/dam/b2c/en-au/campaign/4k-monitor/d-4k-monitor-01.jpg" class="rounded"
            alt="technology" />
          <div class=" info">
            <p class="title">Is at purse tried jokes china ready decay an. Is at purse tried jokes china ready decay
              an. </p>
            <p class="extra">
              Category dkk
            </p>
          </div>
        </div>


      </div>
    </div>
  </div>

</div>
{{-- <div class="flex flex-wrap justify-center more-posts">
      <div class="post w-full lg:w-1/3">
        <img src="https://fooddiversity.today/wp-content/uploads/2016/05/placeholder.png" alt="">
        <div class="info">
          <p class="title">This is titleThis is titleThis is titleThis is titleThis is titleThis is titleThis is
            titleThis
            is title</p>
          <p class="extra">
            <span>{{ date_to_human($article->publish_date,'d F Y') }}</span>
<span class="px-2">|</span>
<span x-text="readingMinutes"></span>
</p>
</div>
</div>
<div class="post w-full lg:w-1/3">
  <img src="https://fooddiversity.today/wp-content/uploads/2016/05/placeholder.png" alt="">
  <div class="info">
    <p class="title">Excepturi ratione molestiae repudiandae ea quaerat saepe placeat deleniti.</p>
    <p class="extra">
      <span>{{ date_to_human($article->publish_date,'d F Y') }}</span>
      <span class="px-2">|</span>
      <span x-text="readingMinutes"></span>
    </p>
  </div>
</div>
<div class="post w-full w- lg:w-1/3">
  <img src="https://image.shutterstock.com/image-vector/default-ui-image-placeholder-wireframes-260nw-1037719192.jpg"
    alt="">
  <div class="info">
    <p class="title">This is title</p>
    <p class="extra">
      <span>{{ date_to_human($article->publish_date,'d F Y') }}</span>
      <span class="px-2">|</span>
      <span x-text="readingMinutes"></span>
    </p>
  </div>
</div>
</div> --}}

@endsection

@push('styles')
<style>

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
      
      this.readingMinutes = minutes <= 1 ? `${minutes} minute read` : `${minutes} minutes read`;
    }
  }
}

</script>
@endsection