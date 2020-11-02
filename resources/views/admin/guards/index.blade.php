@extends('admin.layouts.master')

@section('meta-content')
<title>Guards | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.guards.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.guards.guards-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection