<div class="container mx-auto author-show">
  <div class="relative h-48 bg-green-300 flex flex-col align-middle items-center justify-center">
    <div class="author-profile rounded-full h-32 w-32 bg-white flex items-center justify-center" style="background-image: url({{  $author->profile->image_link }}); background-size: cover; background-position:
      50%;">

    </div>
    <div class="absolute right-0 bottom-0 p-2 flex items-center space-x-4">
      @if ($author->profile->facebook_link)
      <a href="{{ $author->profile->facebook_link }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-facebook-f text-lg"></i>
        </div>
      </a>
      @endif
      @if ($author->profile->twitter_link)
      <a href="{{ $author->profile->twitter_link }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-twitter text-lg"></i>
        </div>
      </a>
      @endif
      @if ($author->profile->instagram_link)
      <a href="{{ $author->profile->instagram_link }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-instagram text-lg"></i>
        </div>
      </a>
      @endif
      @if ($author->profile->youtube_link)
      <a href="{{ $author->profile->youtube_link }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-youtube text-lg"></i>
        </div>
      </a>
      @endif
    </div>
  </div>

  <div class="mt-20">
    <div class="text-center text-xl font-semibold">{{ $author->full_name }}</div>
    <div class="text-center">{{ $author->profile->bio }}</div>
    <div class="flex items-center align-middle space-x-4 justify-center">
      <div class="text-center">Joined on, {{ date_to_human($author->created_at, 'd F y') }}</div>
      <span>|</span>
      <div class="text-center flex items-center"><i class="fas fa-newspaper pr-2"></i>
        {{ $author->articles()->count() }}
      </div>
      <span>|</span>
      <div class="text-center flex items-center"><i class="fas fa-heart pr-2"></i> {{ $author->total_likes }}</div>
    </div>
  </div>

  <div class="flex flex-col justify-center">
    <div class="mt-10 flex">
      <div class="w-full lg:w-2/3">
        @foreach ($articles as $article)
        <livewire:browser.articles.article-display-small :article="$article" :key="$article->id" />
        @endforeach
        {{-- @if ($articles->hasMorePages())
        <div class="flex justify-center">
          <a wire:click='loadMore' class="border border-black rounded p-2 cursor-pointer">Load More</a>
        </div>
        @endif --}}
      </div>
      <div class="w-1/3">

      </div>
    </div>
  </div>
</div>

@section('scripts')
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    let prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
      if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        window.livewire.emit('author-load-more');
      }
    }

    // window.onscroll = function () {
    //   let currentScrollPos = window.pageYOffset;
    //   if (currentScrollPos === 0) {
    //       document.querySelector(".navbar").style.top = "0";
    //   } else if (prevScrollpos >= currentScrollPos) {
    //       document.querySelector(".navbar").style.top = "0";
    //   } else {
    //       document.querySelector(".navbar").style.top = "-22%";
    //   }
    //   prevScrollpos = currentScrollPos;
    // }
  }
  )
</script>
@endsection