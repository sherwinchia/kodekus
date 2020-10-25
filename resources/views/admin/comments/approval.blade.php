@extends('admin.layouts.master')

@section('meta-content')
<title>Comments | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.comments.approval') }}
@endsection

@section('content')
<div class="flex-1 flex justify-center p-8">

</div>
@endsection

@push('styles')

@endpush

@section('scripts')

@endsection