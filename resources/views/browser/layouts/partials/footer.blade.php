@php
$socials = App\Models\Page::where('name', 'Social')->first();
$socials = unserialize($socials->content);
@endphp

<footer class="flex justify-center items-center border-black border-t bg-gray-900 text-gray-200">
  <div class="container">
    <div class="flex justify-center lg:justify-between p-4 pt-8">
      @if (!empty($socials))
      <div>
        <h3 class="text-lg font-bold mb-4 text-center lg:text-left">Follow {{ config('app.name') }}</h3>
        <p></p>
        <div class="flex justify-center lg:justify-start  space-x-3 text-sm lg:text-normal items-center">

          @foreach ($socials as $social)
          @if ($social['display'])
          <a target="_blank" class="text-lg" href="{{ $social['link'] }}">
            <div style="background-color:{{ $social['color'] }};" class="social-container">
              <i class="{{ $social['icon'] }}"></i>
            </div>
          </a>
          @endif
          @endforeach

          {{-- <a class="social-color" href="">
            <div class="social-container">
              <i class="fab fa-facebook"></i>
            </div>
          </a>
          <a class="social-color" href="">
            <div class="social-container">
              <i class="fab fa-twitter"></i>
            </div>
          </a>
          <a class="social-color" href="">
            <div class="social-container">
              <i class="fab fa-instagram"></i>
            </div>
          </a>
          <a class="social-color" href="">
            <div class="social-container">
              <i class="fab fa-youtube"></i>
            </div>
          </a>
          <a class="social-color" href="">
            <div class="social-container">
              <i class="fab fa-discord"></i>
            </div>
          </a> --}}
        </div>
      </div>
      @endif
      {{-- <div>
        Newsletter
      </div> --}}
    </div>

    <div class="flex justify-center lg:justify-between p-4 align-middle items-center font-light">
      <div>
        &#169; {{ config('app.name') . ' ' . date('Y')}}
      </div>
      <div class="hidden justify-center space-x-6 p-2 text-sm lg:flex uppercase">
        <a class="{{ request()->is('/') ? 'border-b' : '' }} border-white py-1"
          href="{{ route('browser.home.index') }}">
          Home
        </a>
        <a class="{{ request()->is('about*') ? 'border-b' : '' }} border-white py-1"
          href="{{ route('browser.about.index') }}">
          About
        </a>
        <a class="{{ request()->is('series*') ? 'border-b' : '' }} border-white py-1"
          href="{{ route('browser.series.index') }}">
          Series
        </a>
        <a class="{{ request()->is('search*') ? 'border-b' : '' }} border-white py-1"
          href="{{ route('browser.search.index') }}">
          Search
        </a>
      </div>
    </div>

  </div>
</footer>