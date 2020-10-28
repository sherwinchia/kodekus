<nav x-cloack x-data="{menuDropdown : false, searchExpand : false, profileDropdown: false}"
  class="navbar bg-white border-b border-gray-500">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="flex justify-center items-center relative">
      <div class=" absolute left-0 flex items-center sm:hidden">
        <button @click="menuDropdown = !menuDropdown"
          class="inline-flex items-center justify-center p-2 rounded-md text-black" aria-label="Main menu"
          aria-expanded="false">
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="container flex-1 flex items-center justify-center">
        <div class="flex w-full justify-center sm:justify-start align-middle items-center py-4 sm:px-4 space-x-10">
          <a class="text-xl font-bold font-roboto" href="{{ route('browser.home.index') }}">
            <h2>Ko&#60;\ing&#62;</h2>
          </a>
          <div class="hidden sm:flex items-center space-x-6">
            <a href="{{ route('browser.home.index') }}"
              class=" {{ request()->is('home') ? 'border-b' : '' }} border-black font-roboto py-1 uppercase">
              Home
            </a>
            <a href="{{ route('browser.about.index') }}"
              class=" {{ request()->is('about*') ? 'border-b' : '' }} border-black font-roboto py-1 uppercase">
              About
            </a>
            <a href="{{ route('browser.series.index') }}"
              class=" {{ request()->is('series*') ? 'border-b' : '' }} border-black font-roboto py-1 uppercase">
              Series
            </a>
          </div>
        </div>
        <div class="justify-between align-middle items-center hidden sm:flex py-4 space-x-2">
          <div class="search-box space-x-2">
            <i @click="searchExpand = !searchExpand" class="fas fa-search pr-2"></i>
            <input x-show="searchExpand" wire:model="search" wire:keydown.enter="search" type="text"
              class="text-sm font-light" placeholder="Cari">
          </div>
          <div class="flex items-center space-x-4">
            @guest
            <a href="{{ route('browser.auth.show', ['type' => 'login']) }}">Login</a>
            <a class="border border-black p-2 rounded"
              href="{{ route('browser.auth.show', ['type' => 'register']) }}">Register</a>
            @endguest

            @auth
            <div class="flex flex-col justify-end relative" @mouseexit="profileDropdown = false">
              <button @mouseenter="profileDropdown = true"><i class="far fa-user"></i></button>
              <div class="absolute bg-white p-3 border border-black w-32 flex flex-col"
                style="bottom:-7rem; left:-6rem;" x-show="profileDropdown" @click.away="profileDropdown = false">
                <a class="pb-2">{{ current_user()->full_name }}</a>
                <div class="border-b border-black mb-2"></div>
                <a href="{{ route('browser.profile.show') }}">Profile</a>
                <a href="{{ route('browser.logout') }}">Logout</a>
              </div>
            </div>
            @endauth

          </div>
        </div>
      </div>
    </div>
  </div>
  <div x-show.transition.origin.top="menuDropdown" class="" @click.away="menuDropdown = !menuDropdown">
    <div class="flex justify-center px-4">
      <a href="{{ route('browser.home.index') }}" class="px-3 py-2 rounded-md text-sm font-light uppercase">Home</a>
      <a href="{{ route('browser.search.index') }}"
        class="ml-4 px-3 py-2 rounded-md text-sm font-light uppercase">Search</a>
      <a href="{{ route('browser.series.index') }}"
        class="ml-4 px-3 py-2 rounded-md text-sm font-light uppercase">Series</a>
      <div class="ml-6 search-box">
        <input x-show="searchExpand" wire:model.debounce.300ms="search" type="text" class="text-sm font-light"
          placeholder="Cari">
        <i @click="searchExpand = !searchExpand" class="fas fa-search"></i>
      </div>
    </div>
  </div>
</nav>