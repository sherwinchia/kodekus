@extends('admin.layouts.master')

@section('meta-content')
<title>Dashboard | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.dashboard.index') }}
@endsection

@section('content')
<div class=" flex flex-wrap space-x-4 p-8 ">
  <div class="card w-32">
    <div class="card-header">
      <i class="fas fa-user"></i>
      <span>| User</span>
    </div>
    <div class="card-body">
      100
    </div>
  </div>
  <div class="card w-32">
    <div class="card-header">
      <i class="fas fa-book"></i>
      <span>| Article</span>
    </div>
    <div class="card-body">
      100
    </div>
  </div>

</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection