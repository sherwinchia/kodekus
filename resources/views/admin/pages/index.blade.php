@extends('admin.layouts.master')

@section('meta-content')
<title>Pages &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.pages.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.pages.pages-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection