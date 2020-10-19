<div>
  @foreach ($articles as $index=>$article)
  @if ($index > 1)
  <div class="small-post flex mb-4">
    <div class="w-56 h-56 mr-4 rounded-sm" style="background-image: url({{  $article->image_link }}); background-size: cover; background-position:
        50%;">
    </div>
    <div class="flex-1 info justify-between">
      <a href="{{ $article->article_link }}">
        <h2 class="title">{{ $article->title }}</h2>
        <p class="description">{{ $article->description }}</p>
      </a>
      <div>
        <div class="flex flex-wrap mb-2">
          @foreach ($article->tags as $tag)
          <a class="w-auto" href="{{ $tag->tag_link }}">
            <div class=" py-1 px-2 text-xs  rounded-sm border border-black text-black text-xs mr-2 mb-2">#
              {{ $tag->name }}
            </div>
          </a>
          @endforeach
        </div>
        <div class="flex items-center text-black text-sm">
          <span class="">{{ date_to_human( $article->publish_date,'d F Y') }}</span>
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
  @endif
  @endforeach
</div>