@php
$footer = App\Models\Page::where('name', 'Footer')->first();
$footer = json_decode($footer->content);
@endphp

{{-- {{ dd($footer->socials) }} --}}

<footer class="pt-4 border-black border-t">
  <div class="hidden lg:flex justify-center space-x-3 text-lg items-center p-2">
    {{-- @foreach ($footer->socials as $social)
    <a style="color:{{ $social->color ?? 'black' }};" href="{{ $social->link ?? '#' }}">
    <div class="social-container">
      <i class="{{ $social->icon ?? '' }}"></i>
    </div>
    </a>
    @endforeach --}}
    <a class="facebook-color" href="">
      <div class="social-container">
        <i class="fab fa-facebook"></i>
      </div>
    </a>
    <a class="twitter-color" href="">
      <div class="social-container">
        <i class="fab fa-twitter"></i>
      </div>
    </a>
    <a class="instagram-color" href="">
      <div class="social-container">
        <i class="fab fa-instagram"></i>
      </div>
    </a>
    <a class="youtube-color" href="">
      <div class="social-container">
        <i class="fab fa-youtube"></i>
      </div>
    </a>
    <a class="discord-color" href="">
      <div class="social-container">
        <i class="fab fa-discord"></i>
      </div>
    </a>
  </div>
  <div class="hidden lg:flex justify-center space-x-3  p-2">
    <a href="{{ route('browser.home.index') }}">
      Home
    </a>
    <a href="{{ route('browser.search.index') }}">
      Series
    </a>
    <a href="">
      Faq
    </a>
    <a href="{{ route('browser.about.index') }}">
      About
    </a>
  </div>
  <div class="py-4 flex justify-center">
    &#169; Copyright 2020 Ko&#60;\ing&#62;
  </div>
</footer>