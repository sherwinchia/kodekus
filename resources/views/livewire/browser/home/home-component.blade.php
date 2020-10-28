<div class="home-index container bg-white mx-auto p-4">
  <div class="flex flex-col lg:flex-row justify-between mb-4">
    <div class="w-12/12 lg:w-8/12 lg:mr-4 ">
      @foreach ($latestArticles as $article)
      <livewire:browser.articles.article-display-small :article="$article" :key="$article->id" />
      @endforeach

      {{-- @if ($latestArticles->hasMorePages())
      <div class="flex justify-center">
        <a wire:click='loadMore' class="border border-black rounded p-2 cursor-pointer">Load More</a>
      </div>
      @endif --}}
    </div>

    <div class="w-12/12 lg:w-3/12 flex flex-col">
      <div class="hidden lg:block">
        @if (!$categories->isEmpty())
        <div class="mb-8">
          <div class="flex items-center py-2 border-b border-gray-500">
            <h5 class="font-semibold tracking-wider font-roboto text-xl uppercase text-black">Kategori</h5>
          </div>
          <div class="flex flex-col w-full ">
            @foreach ($categories as $category)
            <a href="{{ $category->category_link }}"
              class="  text-black p-2 cursor-pointer text-md hover:bg-gray-100 flex justify-between">
              <span>{{ $category->name }}</span>
              <span>
                {{ $category->articles->count() }}
              </span>
            </a>
            @endforeach
          </div>
        </div>
        @endif
      </div>

      <div class="hidden lg:block">
        @if (!$tags->isEmpty())
        <div class="mb-8">
          <div class="flex items-center py-2 mb-2 border-b border-gray-500">
            <h5 class="font-semibold tracking-wider font-roboto text-xl uppercase text-black">Topik</h5>
          </div>
          <div class=" flex flex-wrap">
            @foreach ($tags as $tag)
            <a class="w-auto cursor-pointer mr-2" href="{{ $tag->tag_link }}">
              <div class="py-1 px-2 rounded-sm border border-black text-black text-sm mb-2">#
                {{ $tag->name }}
              </div>
            </a>
            @endforeach
          </div>
        </div>
        @endif
      </div>

      <div class="hidden lg:block">
        <div class="mb-8 h-full">
          <div class="">
            {{-- right-sticky --}}
            <livewire:browser.bookmarks.bookmarks-component type="home" />
            @if (!current_user() || (current_user() && !current_user()->subscribeToNewsletter()))
            <livewire:browser.partials.subscribe-component />
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
      let prevScrollpos = window.pageYOffset;
      window.onscroll = function () {
        let currentScrollPos = window.pageYOffset;

        if (currentScrollPos === 0) {
            document.querySelector(".navbar").style.top = "0";
        } else if (prevScrollpos >= currentScrollPos) {
            document.querySelector(".navbar").style.top = "0";
        } else {
            document.querySelector(".navbar").style.top = "-22%";
        }
        prevScrollpos = currentScrollPos;

        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
          window.livewire.emit('home-load-more');
        }
      }
    }
  )
</script>
@endsection