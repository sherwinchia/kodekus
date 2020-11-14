@extends('admin.layouts.master')

@section('meta-content')
<title>Permission &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.permissions.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.permissions.permissions-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection