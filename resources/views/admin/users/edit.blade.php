@extends('admin.layouts.master')

@section('meta-content')
<title>User | {{ config('app.name') }} </title>
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.users.user-form userId="{{ $user->id }}" />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection