<div class="bookmark-display flex mb-4 items-center">
  @if ($image)
  <div class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48  lg:w-56 lg:h-56 mr-4 rounded-sm" style="background-image: url({{  $bookmarkable->image_link }}); background-size: cover; background-position:
    50%;">
  </div>
  @endif
  <div class="flex-1 info justify-between">
    <a class="mb-2" href="{{ $bookmarkable->article_link }}">
      <h4 class="title">{{ $bookmarkable->title }}</h4>
      <p class="description text-sm">{{ $bookmarkable->description }}</p>
    </a>
    <div>
      <div class="tags flex-wrap hidden lg:flex">
        @foreach ($bookmarkable->tags as $tag)
        <a class=" w-auto" href="{{ $tag->tag_link }}">
          <div class=" py-1 px-2 text-xs  rounded-sm border border-black text-black text-xs mr-2 mb-2">#
            {{ $tag->name }}
          </div>
        </a>
        @endforeach
      </div>
      <div class="flex items-center text-black text-sm">
        <span class="">{{ date_to_human( $bookmarkable->publish_date,'d F') }}</span>
        <span class="px-2">|</span>
        <span class="">{{  $bookmarkable->read_minutes }}</span>
        <span class="px-2">|</span>
        <span class="">
          <livewire:browser.partials.bookmark-component :bookmarkableId="$bookmarkable->id" :key="$bookmarkable->id" />
        </span>
      </div>
    </div>
  </div>
</div>