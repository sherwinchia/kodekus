@extends('admin.layouts.master')

@section('meta-content')
<title>Guard | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{-- {{ Breadcrumbs::render('admin.guards.create') }} --}}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.guards.guard-form />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection