{{-- <div class="search-article w-full md:w-1/2 lg:w-1/3 p-2">
  <img src="{{ $article->image_link }}" class="rounded" alt="technology" />
<div class="info flex">
  <a class="h-24 overflow-hidden mb-2" href="{{ $article->article_link }}">
    <p class="font-semibold">{{ $article->title }}</p>
    <p class="description">{{ $article->description }}</p>
  </a>
  <div class="extra flex flex-col">
    <div class="hidden lg:flex flex-wrap">
      @foreach ($article->tags as $tag)
      <a class="w-auto" href="{{ $tag->tag_link }}">
        <div class="py-1 px-2 text-sm rounded-sm border border-black mr-2 mb-2"># {{ $tag->name }}</div>
      </a>
      @endforeach
    </div>
    <div class="mb-2 flex items-center">
      <span>{{ date_to_human($article->publish_date,'d F Y') }}</span>
      <span class="px-2"> | </span>
      <span>{{ $article->read_minutes }}</span>
      <span class=" px-2">|</span>
      <livewire:browser.partials.bookmark-component :bookmarkableId="$article->id" :key="$article->id" />
    </div>
  </div>
</div>
</div> --}}


<div class="article-sm flex mb-4 items-center">
  <div class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48  lg:w-56 lg:h-56 mr-4 rounded-sm" style="background-image: url({{  $article->image_link }}); background-size: cover; background-position:
      50%;">
  </div>
  <div class="flex-1 info justify-between">
    <a class="mb-2" href="{{ $article->article_link }}">
      <h3 class="title">{{ $article->title }}</h3>
      <p class="description">{{ $article->description }}</p>
    </a>
    <div>
      <div class="tags flex-wrap hidden lg:flex">
        @foreach ($article->tags as $tag)
        <a class=" w-auto" href="{{ $tag->tag_link }}">
          <div class=" py-1 px-2 text-xs  rounded-sm border border-black text-black text-xs mr-2 mb-2">#
            {{ $tag->name }}
          </div>
        </a>
        @endforeach
      </div>
      <div class="flex items-center text-black text-sm">
        <span class="">{{ date_to_human( $article->publish_date,'d F') }}</span>
        <span class="px-2">|</span>
        <span class="">{{  $article->read_minutes }}</span>
        <span class="px-2">|</span>
        <span class="">
          <livewire:browser.partials.bookmark-component :bookmarkableId="$article->id" :key="$article->id" />
        </span>
      </div>
    </div>
  </div>
</div>