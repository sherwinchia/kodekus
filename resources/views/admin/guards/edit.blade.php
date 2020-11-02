@extends('admin.layouts.master')

@section('meta-content')
<title>Guard | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.guards.edit', $guard) }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.guards.guard-form guardId="{{ $guard->id }}" />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection