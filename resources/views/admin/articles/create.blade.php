@extends('admin.layouts.master')

@section('meta-content')
<title>Article &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.articles.create') }}
@endsection

@section('content')
<livewire:admin.articles.article-form />
@endsection