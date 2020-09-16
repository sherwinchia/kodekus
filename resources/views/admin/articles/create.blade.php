@extends('admin.layouts.master')

@section('meta-content')
<title>Article | {{ config('app.name') }} </title>
@endsection

@section('content')
<div class="flex-1 flex flex-col">
  <livewire:admin.articles.article-form />
</div>
@endsection