@extends('admin.layouts.master')

@section('meta-content')
<title>User | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.users.index') }}
@endsection


@section('content')
<div class="flex-1 flex flex-col p-8">
  <h2>Users | {{ config('app.name') }}</h2>
  <livewire:admin.users.users-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection