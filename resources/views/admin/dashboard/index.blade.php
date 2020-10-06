@extends('admin.layouts.master')

@section('meta-content')
<title>Dashboard | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.dashboard.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <h2>Dashboard | {{ config('app.name') }}</h2>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection