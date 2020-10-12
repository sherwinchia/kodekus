@extends('admin.layouts.master')

@section('meta-content')
<title>Article | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.articles.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.articles.articles-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection