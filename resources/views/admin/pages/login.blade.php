@extends('admin.layouts.stranger')

@section('meta-content')
<title>Login &middot; {{ config('app.name') }} </title>
@endsection

@section('content')

<livewire:admin.pages.login-form />

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection