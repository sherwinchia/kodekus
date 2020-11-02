{{-- <div class="flex flex-wrap">
  @foreach ($articles as $article)
  <div class="article-thumbnail w-full lg:w-1/3 px-0 py-2 lg:py-0 lg:px-2">
    <img src="{{ $article->image_link }}" class="rounded" alt="technology" />
<div class=" info">
  <a class="h-24 overflow-hidden" href="{{ $article->article_link }}">
    <p class="font-semibold">{{ $article->title }}</p>
    <p class="description">{{ $article->description }}</p>
  </a>
  <div class="extra">

    <div class="mb-2">
      <span>{{ date_to_human($article->publish_date,'d F Y') }}</span>
      <span> | </span>
      <span>{{ $article->read_minutes }}</span>
    </div>

    <div class="flex flex-wrap">
      @foreach ($article->tags as $tag)
      <a class="w-auto" href="{{ $tag->tag_link }}">
        <div class="py-1 px-2  rounded-sm border border-black mr-2 mb-2"># {{ $tag->name }}</div>
      </a>
      @endforeach
    </div>
  </div>
</div>
</div>
@endforeach
</div> --}}

<div class="flex flex-wrap">
  @foreach ($articles as $article)
  <div class="article-md w-full md:w-1/2 lg:w-1/3 p-2">
    <img src="{{ $article->image_link }}" class="rounded" alt="technology" />
    <div class=" info">
      <a class="h-24 overflow-hidden mb-2" href="{{ $article->article_link }}">
        <h4 class="title">{{ $article->title }}</h4>
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
        <div class="flex items-center text-gray-700 font-light text-sm  justify-between">
          <div class="flex space-x-4">
            <span><a href="{{ $article->author->author_link }}"><i
                  class="pr-2 far fa-user"></i>{{ $article->author->full_name }}</a></span>
            <span class=""><i
                class="pr-2 far fa-calendar-alt"></i>{{ date_to_human( $article->publish_date,'F d') }}</span>
            <span class="hidden xl:inline-block"><i class="pr-2 far fa-clock"></i>{{  $article->read_minutes }}</span>
          </div>
          <livewire:browser.partials.bookmark-component :bookmarkableId="$article->id" :key="$article->id" />
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>