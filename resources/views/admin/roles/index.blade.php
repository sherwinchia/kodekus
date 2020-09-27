@extends('admin.layouts.master')

@section('meta-content')
<title>Role | {{ config('app.name') }} </title>
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <h2>Roles | {{ config('app.name') }}</h2>
  <livewire:admin.roles.roles-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection