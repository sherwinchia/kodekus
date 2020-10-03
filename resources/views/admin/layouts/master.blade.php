@extends('admin.layouts.partials.main')

@section('master')

<main class="">

  <div x-data="{profileDrop:false, sidebarVisible:true}" class="flex min-h-screen h-screen">


    <div class="flex-1 flex overflow-hidden">
      <div x-show="sidebarVisible"
        class="navigation-bar w-56 flex-none overflow-y-auto bg-dark-200 transform origin-left">
        <div class="h-16 text-center text-white border-b border-r border-gray-500 overflow-hidden">
          <img src="{{ asset('images/brand.png') }}" alt="">
        </div>
        <div>
          <livewire:admin.navbar>
        </div>
      </div>
      <div class="content flex-1 flex flex-col overflow-y-auto">
        <div class="bg-dark-200 flex justify-between items-center p-3 h-16">
          <div class=" brand text-white text-lg font-roboto font-bold uppercase cursor-pointer"
            @click="sidebarVisible=!sidebarVisible">
            <i class="fas fa-bars w-8 text-lg text-white"></i>
          </div>
          {{-- <div>
            <div class="w-10 h-10 bg-white cursor-pointer rounded-full overflow-hidden"
              @click="profileDrop=!profileDrop">
              <img class="mt-1" src="{{ asset('storage/profile/default_profile.svg') }}" alt="">
        </div>
        <div class="absolute right-0 mt-4 mr-2 ">
          <ul class="p-2 w-32 rounded-lg bg-base transform origin-top-right" x-show="profileDrop"
            @click.away="profileDrop = false" x-transition:enter="transition-all ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition-all ease-in duration-200" x-transition:leave-start="opacity-100 scale-75"
            x-transition:leave-end="opacity-0 scale-0">
            <li class="flex">
              <a href="{{ route('admin.profile.show') }}" class="flex-1 rounded-lg px-2 py-1 hover:bg-hover">
                Edit Profile
              </a>
            </li>
            <li class="flex">
              <a href="#" class="flex-1 rounded-lg px-2 py-1 hover:bg-hover">
                Logout
              </a>
            </li>
          </ul>
        </div>
      </div> --}}
    </div>

    <div class="">
      @include('admin.layouts.partials.notifications')
    </div>

    @yield('content')
  </div>
  </div>

  {{-- <div class="footer text-center p-3 bg-white ">
      Design and Built by Sherwin Variancia
    </div> --}}

  </div>
</main>
@endsection