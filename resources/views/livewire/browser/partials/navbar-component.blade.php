<nav x-data="{menuDropdown : false, searchExpand : true, profileDropdown: false}"
    class="navbar bg-base border-b border-gray-800 ">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="flex justify-center items-center relative">
            <div class=" absolute right-0 flex items-center sm:hidden">
                <button @click="menuDropdown = !menuDropdown"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-800" aria-label="Main menu"
                    aria-expanded="false">
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="container flex-1 flex items-center justify-center">
                <div class="flex w-full justify-center sm:justify-start align-middle items-center sm:px-4 space-x-6">
                    <a class="text-xl font-bold font-roboto" href="{{ route('browser.home.index') }}">
                        <img width="80" height="80" src="{{ asset('images/brand/logo-transparent.png') }}" alt="Logo">
                        {{-- <h2>Ko&#60;\ing&#62;</h2> --}}
                    </a>
                    <div class="hidden sm:flex items-center space-x-6 text-sm uppercase">
                        <a href="{{ route('browser.home.index') }}"
                            class=" {{ request()->is('/') ? 'border-b' : '' }} border-gray-800 py-1">
                            Home
                        </a>
                        <a href="{{ route('browser.about.index') }}"
                            class=" {{ request()->is('about*') ? 'border-b' : '' }} border-gray-800 py-1">
                            About
                        </a>
                        <a href="{{ route('browser.series.index') }}"
                            class=" {{ request()->is('series*') ? 'border-b' : '' }} border-gray-800 py-1">
                            Series
                        </a>
                        <a href="{{ route('browser.quizzes.index') }}"
                            class=" {{ request()->is('quiz*') ? 'border-b' : '' }} border-gray-800 py-1">
                            Quiz
                        </a>
                        <a href="{{ route('browser.search.index') }}"
                            class=" {{ request()->is('search*') ? 'border-b' : '' }} border-gray-800 py-1">
                            Search
                        </a>
                    </div>
                </div>
                <div class="justify-between align-middle items-center hidden sm:flex py-4 space-x-2 ">
                    {{-- <div class="search-box space-x-2 input-group">
            <input x-show.transition="searchExpand" wire:model="search" wire:keydown.enter="search" type="text"
              class="text-md font-light border border-gray py-2 px-3" placeholder="Cari">
            <i @click="searchExpand = !searchExpand" class="fas fa-search pr-2"></i>
          </div> --}}
                    <div class="flex items-center space-x-4 text-sm">
                        @guest
                            <a href="{{ route('browser.auth.show', ['type' => 'login']) }}">Login</a>
                            <a class="border border-gray-800 py-2 px-2 rounded"
                                href="{{ route('browser.auth.show', ['type' => 'register']) }}">Register</a>
                        @endguest

                        @auth
                            <div class="flex flex-col justify-end relative" @mouseexit="profileDropdown = false">
                                {{-- <button @mouseenter="profileDropdown = true"><i class="far fa-user"></i></button> --}}
                                <button @mouseenter="profileDropdown = true">
                                    <div class="rounded-full h-10 w-10 lg:h-10 lg:w-10 bg-white mr-2" style="background-image: url({{ current_user()->profile->image_link }}); background-size: cover; background-position:
                              50%;">
                                    </div>
                                </button>
                                <div class=" absolute bg-white p-3 border border-gray-800 w-40 flex flex-col shadow"
                                    style="top:60px; right:10px;" x-cloak x-show="profileDropdown"
                                    @click.away="profileDropdown = false">
                                    <span class="pb-2 text-normal overflow-hidden">{{ current_user()->full_name }}</span>
                                    <div class="border-b border-gray-800 mb-2"></div>
                                    <a class="hover:bg-gray-200 py-2 px-1"
                                        href="{{ route('browser.profile.show') }}">Profile</a>
                                    <a class="hover:bg-gray-200 py-2 px-1"
                                        href="{{ route('browser.logout') }}">Logout</a>
                                </div>
                            </div>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-cloak x-show.transition.origin.top="menuDropdown" class="pb-4">
        <div class="flex flex-col justify-center">
            <div class="flex justify-center">
                <a href="{{ route('browser.home.index') }}"
                    class="px-3  rounded-md text-sm font-light uppercase">Home</a>
                <a href="{{ route('browser.about.index') }}"
                    class=" px-3  rounded-md text-sm font-light uppercase">About</a>
                <a href="{{ route('browser.search.index') }}"
                    class=" px-3  rounded-md text-sm font-light uppercase">Search</a>
                <a href="{{ route('browser.series.index') }}"
                    class=" px-3  rounded-md text-sm font-light uppercase">Series</a>
            </div>
            @auth
                <div class="flex justify-center mt-4">
                    <a href="{{ route('browser.profile.show') }}"
                        class="px-3 rounded-md text-sm font-light uppercase">Profile</a>
                    <a href="{{ route('browser.logout') }}"
                        class="px-3 rounded-md text-sm font-light uppercase">Logout</a>
                </div>
            @endauth

            @guest
                <div class="flex justify-center mt-4">
                    <a class="px-3 rounded-md text-sm font-light uppercase"
                        href="{{ route('browser.auth.show', ['type' => 'login']) }}">Login</a>
                    <a class="px-3 rounded-md text-sm uppercase font-semibold"
                        href="{{ route('browser.auth.show', ['type' => 'register']) }}">Register</a>
                </div>
            @endguest
        </div>
    </div>
</nav>
