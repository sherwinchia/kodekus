@section('meta-content')
<title>Article | {{ config('app.name') }} </title>
@endsection


<div class="flex-1 flex overflow-hidden h-100">

  {{-- <div class="mb-4" x-data x-ref="quillEditor" x-init="
    quill = new Quill($refs.quillEditor, {theme: 'snow'});
    quill.on('text-change', function () {
      $dispatch('input', quill.root.innerHTML);
    });
  ">
  </div> --}}

  <div class="flex-1 overflow-y-auto py-3">
    <div x-data="editorJs()" id="editorjs" x-init="mountEditorJs()">

    </div>
  </div>
  <div class="bg-dark-200 flex-none px-6 overflow-y-auto">

    {{-- Meta Content --}}
    <div class="card">
      <div class="card-header">
        <p>Meta Content</p>
      </div>
      <div class="card-body">
        <div class="input-group">
          <label for="meta_title">Meta Title</label>
          <input type="text" name="" id="">
        </div>
        <div class="input-group">
          <label for="meta_description">Meta Description</label>
          <textarea type="text" name="" id=""></textarea>
        </div>
        <div class="input-group">
          <label for="meta_image">Meta Image</label>
          <input type="file" name="" id="">
        </div>
        <div class="input-group">
          <label for="slug">Slug </label>
          <input type="text" name="" id="">
        </div>
      </div>
    </div>

    {{-- Published --}}
    <div class="card">
      <div class="card-header">
        <p>Published</p>
      </div>
      <div class="card-body">
        <div class="input-group">
          <label for="meta_title">Publish Date</label>
          <input type="text" name="" id="">
        </div>
        <div class="input-group">
          <label for="meta_description">Published</label>
          <input type="checkbox">
        </div>
      </div>
    </div>

    {{-- Featured --}}
    <div class="card">
      <div class="card-header">
        <p>Featured</p>
      </div>
      <div class="card-body">
        <div class="input-group">
          <label for="meta_description">Featured</label>
          <input type="checkbox">
        </div>
      </div>
    </div>

    {{-- Trending --}}
    <div class="card">
      <div class="card-header">
        <p>Trending</p>
      </div>
      <div class="card-body">
        <div class="input-group">
          <label for="meta_description">Trending</label>
          <input type="checkbox">
        </div>
      </div>
    </div>


  </div>
</div>


@push('styles')

@endpush

@section('scripts')
<script>
  function editorJs(){
    return {
      //Data
      data:{},

      //Function
      mountEditorJs(){
        editor = new EditorJS({
          placeholder: 'Let`s write an awesome story!'  
        });
      },
    }
  }
</script>
@endsection