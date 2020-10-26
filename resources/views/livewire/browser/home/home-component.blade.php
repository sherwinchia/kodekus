<div class="home-index container bg-white mx-auto p-4">
  <div class="flex flex-col lg:flex-row justify-center mb-4">
    <div class="w-12/12 lg:w-9/12 lg:mr-4 ">
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
      @if (!$categories->isEmpty())
      <div class="mb-8">
        <div class="flex items-center mb-2 border-b border-black">
          <i class="fas fa-layer-group mr-2"></i>
          <h5 class="font-bold text-lg uppercase text-black">Kategori</h5>
        </div>
        <div class="flex flex-wrap">
          @foreach ($categories as $category)
          <a href="{{ $category->category_link }}"
            class="w-6/12 border-l p-2 border-black text-black cursor-pointer text-md hover:bg-gray-100">
            <span>{{ $category->name }}</span>
          </a>
          @endforeach
        </div>
      </div>
      @endif

      @if (!$tags->isEmpty())
      <div class="mb-8">
        <div class="flex items-center mb-2 border-b border-black">
          <i class="fas fa-hashtag mr-2"></i>
          <h5 class="font-bold text-lg uppercase text-black text-sm">Topik</h5>
        </div>

        <div class=" flex flex-wrap">
          @foreach ($tags as $tag)
          <a class="w-auto cursor-pointer mr-2" href="{{ $tag->tag_link }}">
            <div class="py-1 px-2 text-sm rounded-sm border border-black text-black text-sm mb-2">#
              {{ $tag->name }}
            </div>
          </a>
          @endforeach
        </div>
      </div>
      @endif


      <div class="mb-8 h-full">
        <div class="">
          {{-- right-sticky --}}
          <livewire:browser.bookmarks.bookmarks-component />
          {{-- <livewire:browser.partials.subscribe-component /> --}}
        </div>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    let prevScrollpos = window.pageYOffset;
    // window.onscroll = function () {
    //   if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    //     console.log('here');
    //     window.livewire.emit('home-load-more');
    //   }
    // }

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
    }
  }
  )
</script>
@endsection