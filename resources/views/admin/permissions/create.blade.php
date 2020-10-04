@extends('admin.layouts.master')

@section('meta-content')
<title>Permission | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.permissions.create') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.permissions.permission-form />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection