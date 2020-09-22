@extends('admin.layouts.master')

@section('meta-content')
<title>Category | {{ config('app.name') }} </title>
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <h2>Categories | {{ config('app.name') }}</h2>
  <livewire:admin.categories.categories-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection