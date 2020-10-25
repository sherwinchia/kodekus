@extends('admin.layouts.master')

@section('meta-content')
<title>Comments | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.comments.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.comments.comments-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection