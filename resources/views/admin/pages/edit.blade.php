@extends('admin.layouts.master')

@section('meta-content')
<title>Page | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.pages.edit', $page) }}
@endsection

@section('content')

<div class="flex-1 flex flex-col p-8">
  <livewire:admin.pages.page-form pageId="{{ $page->id }}" />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection