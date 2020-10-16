@extends('admin.layouts.master')

@section('meta-content')
<title>Series | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.series.create') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.series.series-form />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection