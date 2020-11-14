@extends('admin.layouts.master')

@section('meta-content')
<title>User &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.users.create') }}
@endsection


@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.users.user-form />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection