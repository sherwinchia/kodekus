@extends('admin.layouts.master')

@section('meta-content')
<title>Role &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.roles.edit', $role) }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.roles.role-form roleId="{{ $role->id }}" />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection