@extends('admin.layouts.master')

@section('meta-content')
<title>Article | {{ config('app.name') }} </title>
@endsection

@section('content')
<div x-data="datatable()" class="flex-1 flex flex-col p-8">
  <div class="relative">
    <button class="absolute right-0" x-on:click="onCreateClicked()">Create</button>
  </div>
  <livewire:admin.articles.article-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')
<script>
  function datatable(){
    return {
      //Data

      //Function
      onCreateClicked(){
        location.href=route('admin.articles.create');
      }
    }
  }

  $(document).on('click', 'a#delete_article', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);

    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    })
  });
</script>
@endsection