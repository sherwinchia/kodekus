@extends('admin.layouts.master')

@section('meta-content')
<title>Comments &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.comments.approval') }}
@endsection

@section('content')
<livewire:admin.comments.comments-approval />
@endsection