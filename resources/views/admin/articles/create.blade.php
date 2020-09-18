@extends('admin.layouts.master')

@section('meta-content')
<title>Article | {{ config('app.name') }} </title>
@endsection

@section('content')
<livewire:admin.articles.article-form />
@endsection