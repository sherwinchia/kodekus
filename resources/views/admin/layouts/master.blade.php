@extends('admin.layouts.partials.main')

@section('master')

<main class="">

  <div x-data="{profileDrop:false, sidebarVisible:true}" class="flex min-h-screen h-screen">


    <div class="flex-1 flex overflow-hidden">
      <div x-show="sidebarVisible"
        class="navigation-bar w-56 flex-none overflow-y-auto bg-dark-200 transform origin-left">
        <div class=" text-center text-white border-b border-r border-gray-500 overflow-hidden h-16">
          <img src="{{ asset('images/brand.png') }}" alt="">
        </div>
        <div>
          <livewire:admin.navbar>
        </div>
      </div>
      <div class="content flex-1 flex flex-col overflow-y-auto bg-gray-100">
        <div class="bg-dark-200 flex items-center p-3 h-16">
          <div class="text-white text-lg font-roboto font-bold uppercase cursor-pointer mr-4"
            @click="sidebarVisible=!sidebarVisible">
            <i class="fas fa-bars text-lg text-white"></i>
          </div>
          <div class="text-white">
            @yield('breadcrumbs')
          </div>
        </div>

        @include('admin.layouts.partials.notifications')

        @yield('content')
      </div>
    </div>

    {{-- <div class="footer text-center p-3 bg-white ">
      Design and Built by Sherwin Variancia
    </div> --}}

  </div>
</main>
@endsection