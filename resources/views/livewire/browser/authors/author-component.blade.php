<div class="container mx-auto author-show mt-10">
  <div
    class="relative h-48 border border-gray-800 rounded flex flex-col align-middle items-center justify-center ml-4 mr-4">
    <div class="author-profile rounded-full h-32 w-32 bg-white flex items-center justify-center" style="background-image: url({{  $author->profile->image_link }}); background-size: cover; background-position:
      50%;">
    </div>

    <div class="absolute right-0 bottom-0 p-2 flex items-center space-x-4">
      @if ($author->profile->facebook_link)
      <a href="{{ $author->profile->facebook_link }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-facebook-f text-lg text-gray-800"></i>
        </div>
      </a>
      @endif
      @if ($author->profile->twitter_link)
      <a href="{{ $author->profile->twitter_link }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-twitter text-lg text-gray-800"></i>
        </div>
      </a>
      @endif
      @if ($author->profile->instagram_link)
      <a href="{{ $author->profile->instagram_link }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-instagram text-lg text-gray-800"></i>
        </div>
      </a>
      @endif
      @if ($author->profile->youtube_link)
      <a href="{{ $author->profile->youtube_link }}" target="_blank">
        <div class="social-container">
          <i class="fab fa-youtube text-lg text-gray-800"></i>
        </div>
      </a>
      @endif
    </div>
  </div>

  <div class="mt-20 flex flex-col">
    <div class="w-1/2 mx-auto">
      <div class="text-center text-xl font-semibold">{{ $author->full_name }}</div>
      {{-- <div class="text-center">
        <p style=" overflow-wrap: break-word;">{{ $author->profile->bio }}</p>
    </div> --}}
    <div class="flex items-center align-middle space-x-4 justify-center mt-2">
      {{-- <div class="text-center"> <i class="fas fa-birthday-cake"></i>
          {{ date_to_human($author->created_at, 'd F y') }}</div> --}}
    <div class="text-center flex items-center text-sm"><i class="fas fa-newspaper pr-2"></i>
      {{ $author->articles()->count() }}
    </div>
    <div class="text-center flex items-center  text-sm"><i class="text-red-400 fas fa-heart pr-2"></i>
      {{ $author->total_likes }}</div>
  </div>
</div>
</div>

<div class="flex flex-col justify-center p-4">
  <div class="mt-10 flex flex-wrap">
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
        let currentScrollPos = window.pageYOffset;

        if (currentScrollPos === 0) {
            document.querySelector(".navbar").style.top = "0";
        } else if (prevScrollpos >= currentScrollPos) {
            document.querySelector(".navbar").style.top = "0";
        } else {
            document.querySelector(".navbar").style.top = "-22%";
        }
        prevScrollpos = currentScrollPos;

        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
          window.livewire.emit('author-load-more');
        }

      }
    }
  )
</script>
@endsection