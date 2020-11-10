@extends('browser.layouts.master')

@section('meta-content')
{!! SEOTools::generate() !!}
@endsection

@section('content')
<div class="my-auto">
  <div class=" flex justify-center items-center mb-10">
    <h1 class="text-2xl font-bold uppercase">About {{ config('app.name') }}</h1>
  </div>
  <div class="container bg-white mx-auto p-4">
    <div class="flex flex-col">

      <div class="flex justify-center w-full ">
        <div class="max-w-xl">
          <p class="text-lg mb-4">
            Hallo 👋, selamat datang di {{ config('app.name') }}.
          </p>
          <p class="text-lg mb-4">
            Nama saya Sherwin dan saya adalah mahasiswa semester lima jurusan software engineering. Tujuan utama saya
            membuat website ini adalah
            sebagai catatan untuk pembelajaran saya. Selain itu, saya juga ingin berbagi catatan pembelajaran saya
            dengan
            teman-teman semua. Siapa tahu dapat membantu teman-teman dalam proses belajar pemrogramannya.
          </p>
          <p class="text-lg mb-4">
            Untuk sementara ini saya adalah satu-satunya penulis di blog ini. Bagi teman-teman yang tertarik untuk
            bergabung bersama dengan saya untuk menulis dan berbagi pengalaman di blog ini boleh contact saya di
            sherwin.variancia@koding.com
          </p>
          <p class="text-lg">
            Terima Kasih.
          </p>
          <p class="text-lg mb-4">
            Sherwin Variancia 👨‍💻
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .swiper-slide {
    text-align: left
  }
</style>
@endpush