@extends('admin.layouts.master')

@section('meta-content')
<title>Category &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.categories.edit', $category) }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.categories.category-form categoryId="{{ $category->id }}" />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection