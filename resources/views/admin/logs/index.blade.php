@extends('admin.layouts.master')

@section('meta-content')
<title>Logs &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.logs.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.logs.logs-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection