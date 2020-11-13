@extends('admin.layouts.master')

@section('meta-content')
<title>Dashboard | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.dashboard.index') }}
@endsection

@section('content')
<div class=" flex flex-wrap space-x-4 p-8 ">

</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection