@extends('admin.layouts.master')

@section('meta-content')
<title>Tags &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.tags.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.tags.tags-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection