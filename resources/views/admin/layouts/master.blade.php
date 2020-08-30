@extends('admin.layouts.partials.main')

@section('master')

<main class="">

  <div class="flex flex-col min-h-screen h-screen">

    <div class="bg-dark-200 flex justify-between items-center p-3 ">
      <div class=" brand text-white text-lg font-roboto font-bold uppercase">
        <i class="fas fa-dice-d20 w-8 text-lg text-white "></i>
        Sherwin Chia
      </div>
      <div x-data="{profileDrop:false}">
        <div class="w-10 h-10 bg-white cursor-pointer rounded-full overflow-hidden" @click="profileDrop=true">
          <img class="mt-1" src="{{ asset('storage/profile/default_profile.svg') }}" alt="">
        </div>
        <div class="absolute right-0 mt-4 mr-2 ">
          <ul class="p-2 w-32 rounded-lg bg-base transform origin-top-right" x-show="profileDrop"
            @click.away="profileDrop = false" x-transition:enter="transition-all ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition-all ease-in duration-200" x-transition:leave-start="opacity-100 scale-75"
            x-transition:leave-end="opacity-0 scale-0">
            <li class="flex">
              <a href="#" class="flex-1 rounded-lg px-2 py-1 hover:bg-hover">
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
      </div>
    </div>

    <div class="flex-1 flex overflow-hidden bg-dark-200">
      <div class="navigation-bar w-56 flex-none overflow-y-auto mt-2">
        <livewire:admin.navbar>
      </div>
      <div class="content flex-1 overflow-y-auto p-3 bg-dark-300 text-hover">
        @yield('content')
      </div>
    </div>

    {{-- <div class="footer text-center p-3 bg-white ">
      Design and Built by Sherwin Variancia
    </div> --}}

  </div>



</main>

@endsection

{{-- @include('admin.layouts.partials.main') --}}

{{-- <section class="left col-span-1">
  <livewire:admin.navbar>
</section>
<section class="right col-span-5">
  @yield('content')
</section> --}}