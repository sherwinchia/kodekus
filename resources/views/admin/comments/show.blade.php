@extends('admin.layouts.master')

@section('meta-content')
<title>Comment | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.comments.show', $article) }}
@endsection

@section('content')
<livewire:admin.partials.comment-component :article="$article" />
@endsection

@push('styles')

@endpush

@section('scripts')

@endsection