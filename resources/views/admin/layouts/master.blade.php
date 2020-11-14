@extends('admin.layouts.partials.main')

@section('master')

<main class="">

  <div x-data="{profileDrop:false, sidebarVisible:true}" class="flex min-h-screen h-screen">

    <div class="flex-1 flex overflow-hidden">
      <div x-show="sidebarVisible"
        class="navigation-bar w-64 flex-none overflow-y-auto transform origin-left flex flex-col border-r">
        <div class=" text-center text-black overflow-hidden h-24 flex items-center justify-center px-2">
          <div class=" h-16 w-16" style="background-image: url({{ asset('images/brand/logo-transparent.png') }}); background-size: cover; background-position:
            50%;">
          </div>
          <div class=" font-semibold text-2xl">
            {{ config('app.name') }}
          </div>
        </div>
        <div class="overflow-y-auto">
          <livewire:admin.partials.navbar>
        </div>

      </div>
      <div class="content flex-1 flex flex-col overflow-y-auto bg-gray-100">
        <div class="fixed top-0 w-full flex items-center p-6 h-16">
          <div class="text-black text-lg font-roboto font-bold uppercase cursor-pointer mr-4"
            @click="sidebarVisible=!sidebarVisible">
            <i class="fas fa-bars text-lg text-black"></i>
          </div>
          <div>
            @yield('breadcrumbs')
          </div>
        </div>

        <div class="mb-16">

        </div>

        @include('admin.layouts.partials.notifications')

        @yield('content')
      </div>
    </div>
    {{-- 
    <div class="footer text-center p-3 bg-white ">
      Design and Built by Sherwin Variancia
    </div> --}}

  </div>
</main>
@endsection