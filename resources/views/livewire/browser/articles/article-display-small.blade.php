<div class="article-sm">
  <div class="w-32 h-32 sm:w-40 sm:h-40 md:w-40 md:h-40 lg:w-48 lg:h-48 mr-4 rounded" style="background-image: url({{  $article->image_link }}); background-size: cover; background-position:
      50%;">
  </div>
  <div class="w-32 h-32 sm:w-40 sm:h-40 md:w-40 md:h-40 lg:w-48 lg:h-48 flex-1 info justify-center">
    <a class="mb-2" href="{{ $article->article_link }}">
      <h3 class="title">{{ $article->title }}</h3>
      <p class="description text-gray-700">{{ $article->description }}</p>
    </a>
    <div>
      <div class="tags flex-wrap hidden lg:flex">
        @foreach ($article->tags as $tag)
        <a class=" w-auto" href="{{ $tag->tag_link }}">
          <div class=" py-1 px-2 rounded-sm border border-black text-black text-xs mr-2 mb-2">#
            {{ $tag->name }}
          </div>
        </a>
        @endforeach
      </div>
      <div class="flex items-center text-gray-800 font-light text-sm ">
        <span class="hidden lg:inline-block mr-4">
          <a class="text-black font-normal" href="{{ $article->author->author_link }}">
            <i class="pr-2 far fa-user"></i>{{ $article->author->full_name }}
          </a>
        </span>
        <span class="mr-4">
          <i class="pr-2 far fa-calendar-alt"></i>{{ date_to_human( $article->publish_date,'F d') }}</span>
        <span class="hidden lg:inline-block mr-4">
          <i class="pr-2 far fa-clock"></i>{{  $article->read_minutes }}</span>
        <span class="">
          <livewire:browser.partials.bookmark-component :bookmarkableId="$article->id" :key="$article->id" />
        </span>
      </div>
    </div>
  </div>
</div>