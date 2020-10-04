@extends('admin.layouts.master')

@section('meta-content')
<title>Profile | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.profile.edit', $user) }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.pages.profile-form user="{{ $user->id }}" />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection