@extends('browser.layouts.master')

@section('meta-content')
    {!! SEOTools::generate() !!}
@endsection

@section('content')
    <div class="container mx-auto article-show mt-4 sm:mt-10">
        <div class="flex justify-center mb-4">
            <div class="center w-11/12 lg:w-6/12 xl:w-6/12">
                <div class="">
                    <img loading="lazy" style="border-radius: 5px;" class="mb-4" src="{{ $article->image_link }}" alt="">
                    <h1 class="text-left mb-2 font-semibold text-3xl lg:text-4xl xl:text-5xl">
                        {{ $article->title }}</h1>

                    <div class="flex flex-col lg:flex-row lg:items-center lg:mb-4 lg:space-x-4">
                        <div class="flex items-center align-middle space-x-2 mb-4 lg:mb-0">
                            <div class="rounded-full h-10 w-10 bg-white flex items-center justify-center" style="background-image: url({{ $article->author->profile->image_link }}); background-size: cover; background-position:
                                                  50%;">
                            </div>
                            <div>
                                <a class="text-normal" href="{{ $article->author->author_link }}">
                                    {{ $article->author->full_name }}
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 mb-4 lg:mb-0">
                            <span class="text-xs lg:text-sm mr-2">
                                <i class=" far fa-calendar-alt"></i>
                                {{ date_to_human($article->publish_date, 'F d') }}
                            </span>
                            <span class="text-xs lg:text-sm">
                                <i class=" far fa-clock"></i>
                                {{ $article->read_minutes }}
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
                    {{-- <div class="share flex-1 my-20">
          <div class="left-sticky flex flex-col items-center text-gray-800">
            <div class="mb-2 font-semibold">
              <label class="">Share</label>
            </div>
            <a class="facebook-color" href="{{ $article->share['facebook'] }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-facebook-f text-sm"></i>
        </div>
        </a>

        <a class="twitter-color" href="{{ $article->share['twitter'] }}" target="_blank">
          <div class="social-container">
            <i class="fab fa-twitter text-sm"></i>
          </div>
        </a>

        <a class="linkedin-color" href="{{ $article->share['linkedin'] }}" target="_blank">
          <div class="social-container">
            <i class="fab fa-linkedin-in text-sm"></i>
          </div>
        </a>

        <a class="whatsapp-color" href="{{ $article->share['whatsapp'] }}" target="_blank">
          <div class="social-container">
            <i class="fab fa-whatsapp text-sm"></i>
          </div>
        </a>

      </div>
    </div> --}}
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
                                    <label class="text-md text-gray-700 italic"
                                        for="video-caption">{{ $section->data->caption }}</label>
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
                                    <img loading="lazy" style="border-radius:5px;" src="{{ $section->data->url }}"
                                        alt="{{ $section->data->caption ?? '' }}">
                                    @if (isset($section->data->caption))
                                        <figcaption class="text-center font-light italic">
                                            {{ $section->data->caption ?? '' }}</figcaption>
                                    @endif
                                </figure>
                            </div>

                        @elseif ($section->type == 'quote')
                            <blockquote class="border-l-2 border-black p-3 mb-4">
                                <p>{!! $section->data->text !!}</p>
                                <p class="font-normal text-right mt-4">{!! '- ' . $section->data->caption !!}</p>
                            </blockquote>

                        @elseif($section->type == 'list')
                            <div class="pl-5 mb-4">
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
                                <div class="bg-blue-100 rounded-sm border border-blue-500 text-blue-700 p-4 mb-4"
                                    role="alert">
                                    <p>{!! $section->data->message !!}</p>
                                </div>

                            @elseif ($section->data->type == 'info')
                                <div class="bg-purple-100 rounded-sm border border-purple-500 text-purple-700 p-4 mb-4"
                                    role="alert">
                                    <p>{!! $section->data->message !!}</p>
                                </div>

                            @elseif ($section->data->type == 'success')
                                <div class="bg-green-100 rounded-sm border-green-500 border  text-green-700 p-4 mb-4"
                                    role="alert">
                                    <p>{!! $section->data->message !!}</p>
                                </div>

                            @elseif ($section->data->type == 'warning')
                                <div class="bg-orange-100 rounded-sm border-orange-500 border  text-orange-700 p-4 mb-4"
                                    role="alert">
                                    <p>{!! $section->data->message !!}</p>
                                </div>

                            @elseif ($section->data->type == 'dark')
                                <div class="bg-gray-700 rounded-sm border border-gray-800 text-gray-100 p-4 mb-4"
                                    role="alert">
                                    <p>{!! $section->data->message !!}</p>
                                </div>

                            @elseif ($section->data->type == 'light')
                                <div class="bg-gray-100 rounded-sm border border-gray-300 text-gray-900 p-4 mb-4"
                                    role="alert">
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
                        <a class="w-auto" href="{{ $tag->tag_link }}">
                            <div class="py-1 px-2 text-sm rounded-sm border border-black mr-2 mb-2"># {{ $tag->name }}
                            </div>
                        </a>
                    @endforeach
                </div>

                @if ($article->quiz)
                    <div class="post-tag mb-8 flex flex-wrap">
                        Kerjakan quiz untuk hasil yang lebih maksimal <a class=" ml-2 cursor-pointer underline"
                            href="{{ route('browser.quizzes.show', $article->quiz->id) }}">Klik disini</a>
                    </div>
                @endif

                <div class="post-action flex justify-between items-center pb-4">
                    <div class="flex text-gray-800">
                        <div class="mr-4 flex items-center">
                            <livewire:browser.partials.like-component :likeableId="$article->id" :key="$article->id"
                                :label="'like'" />
                        </div>
                        {{-- <div class="mr-4 flex items-center">
            <i class="text-xl p-1 px-2 far fa-comment"></i>
            <span class="ml-2">comments</span>
          </div> --}}
                        <div class="mr-4 flex items-center">
                            <div class="text-xl">
                                <livewire:browser.partials.bookmark-component :bookmarkableId="$article->id"
                                    :label="'bookmark'" />
                            </div>
                        </div>
                    </div>
                    <div class="flex text-xl">
                        <a class="pl-4 facebook-color" href="{{ $article->share['facebook'] }}" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="pl-4 twitter-color" href="{{ $article->share['twitter'] }}" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="pl-4 linkedin-color" href="{{ $article->share['linkedin'] }}" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a class="pl-4 whatsapp-color" href="{{ $article->share['whatsapp'] }}" target="_blank">
                            <i class="fab fa-whatsapp-square"></i>
                        </a>
                    </div>
                    {{-- <div x-data="{showIcon:false}" class="flex items-center align-middle">
      <div x-show.transition.right="showIcon" class="flex text-xl  border-r border-black pr-4">
        <a class="pl-4 facebook-color" href="{{ $article->share['facebook'] }}" target="_blank">
    <i class="fab fa-facebook-square"></i>
    </a>
    <a class="pl-4 twitter-color" href="{{ $article->share['twitter'] }}" target="_blank">
      <i class="fab fa-twitter"></i>
    </a>
    <a class="pl-4 linkedin-color" href="{{ $article->share['linkedin'] }}" target="_blank">
      <i class="fab fa-linkedin"></i>
    </a>
    <a class="pl-4 whatsapp-color" href="{{ $article->share['whatsapp'] }}" target="_blank">
      <i class="fab fa-whatsapp-square"></i>
    </a>
  </div>

  <i @click="showIcon = !showIcon" class="pl-4 cursor-pointer  text-gray-700 fas fa-share-square"></i>

</div> --}}
                </div>

                @if (isset($article->prev_article) || isset($article->next_article))
                    <div class="post-navigation flex justify-between items-center pt-4 border-t border-black">
                        <div>
                            @if (isset($article->prev_article))
                                <a href="{{ $article->prev_article->link }}">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 mr-2 fill-current" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px" y="0px" viewBox="-49 141 512 512"
                                            style="enable-background:new -49 141 512 512;" xml:space="preserve">
                                            <path id="XMLID_10_"
                                                d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z">
                                            </path>
                                        </svg>
                                        Previous
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div>
                            @if (isset($article->next_article))
                                <a href="{{ $article->next_article->link }}">
                                    <div class="flex items-center">
                                        Next
                                        <svg class="h-5 w-5 ml-2 fill-current" clasversion="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px" y="0px" viewBox="-49 141 512 512"
                                            style="enable-background:new -49 141 512 512;" xml:space="preserve">
                                            <path id="XMLID_11_"
                                                d="M-24,422h401.645l-72.822,72.822c-9.763,9.763-9.763,25.592,0,35.355c9.763,9.764,25.593,9.762,35.355,0
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

        <div class="flex justify-center mb-6">
            <div class="w-11/12 lg:w-6/12 article-comments ">
                <livewire:browser.partials.comment-component :article="$article" />
            </div>
        </div>

        <div class="flex justify-center mb-4 ">
            <div class="w-11/12 w-11/12 lg:w-9/12">
                <div class="border-b border-black mb-4 font-semibold text-xl py-2">
                    <label>Artikel Lain</label>
                </div>
                <div class="block space-x-0 ">
                    @foreach ($article->more_articles as $article)
                        <livewire:browser.articles.article-display-small :article="$article" :key="$article->id" />
                    @endforeach
                    {{-- <livewire:browser.articles.articles-display-medium :articles="$article->more_articles" /> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
