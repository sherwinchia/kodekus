<form class="flex-1 flex overflow-hidden article-form">
  {{-- <div wire:ignore class="flex-1">
    <div id="quillJs" wire:key="wysiwygEditor" wire:model.debounce.2000ms="body" class="mb-4" x-data="quillJs()"
      x-init="mountQuillJs()">
    </div>
  </div> --}}

  <div wire:ignore class="flex-1 overflow-y-auto py-3 article-left">
    <div wire:key="editorJs" x-data="formComponents()" id="editorjs" x-init="mountEditorJs()">
    </div>
  </div>

  <div class="flex-none article-right flex flex-col justify-between">
    <div class="overflow-y-auto">
      <section>
        <div class="input-group">
          <label for="title">Title</label>
          <input wire:model="title" wire:input="$emitSelf('titleAdded')" type="text" id="title" maxlength="80">
          <p class="text-xs text-gray-600">{{ strlen($title) }}/80</p>
        </div>
      </section>

      <section>
        <div class="input-group">
          <label for="description">Description</label>
          <textarea wire:model="description" type="text" maxlength="200"></textarea>
          <p class="text-xs text-gray-600">{{ strlen($description) }}/200</p>
        </div>
      </section>

      <section>
        <div x-data="formComponents()" class="input-group">
          <label for="image">Image</label>
          <input type="file" accept="image/*" id="image" x-on:input="onUploadImage()">
          @if ($image)
          <img class="w-64 h-48 mx-auto object-cover overflow-hidden" src="{{ $image }}" alt="">
          @endif
        </div>
      </section>

      <section>
        <div class="input-group">
          <label for="slug">Slug </label>
          <input id="slug" pattern="^[a-z0-9-]+$" type="text" wire:model="slug">
        </div>
      </section>

      <section>
        <div class="input-group">
          <label for="meta_title">Publish Date</label>
          <div id="publish_date"></div>
          {{-- <input
              x-data
              x-ref="input"
              x-init="new Pikaday({ field: $refs.input })"
              type="text"
              {{ $attributes }}
          > --}}
        </div>
        <div class="input-group">
          <label for="meta_description">Published</label>
          <input type="checkbox" wire:model="published">
        </div>
      </section>

      <section>
        <div class="input-group">
          <label for="meta_description">Featured</label>
          <input type="checkbox" wire:model="featured">
        </div>
      </section>

      <section>
        <div class="input-group">
          <label for="meta_description">Trending</label>
          <input type="checkbox" wire:model="trending">
        </div>
      </section>
    </div>

    <div x-data="formComponents()">
      @if ($errors->any())
      <section class=" alert alert-danger mt-1" role="alert">{{ $errors->first() }}</section>
      @endif
      <button x-on:click.prevent="onPublishClicked()" type="submit" class="w-full">Publish</button>
      </section>
    </div>
  </div>
</form>


@push('styles')

@endpush

@section('scripts')
<script>
  function quillJs(){
    return{
      //Data
      //Function
      mountQuillJs(){
        let container = document.getElementById('quillJs');
        quill = new Quill(container, {theme: 'snow'});
        quill.on('text-change', function () {
          let quillData = quill.root.innerHTML;
          console.log(quillData);
          let customEvent = new CustomEvent('input', {detail:JSON.stringify(quillData)});
          container.dispatchEvent(customEvent);
        });
      }
    }
  }
  function formComponents(){
    return {
      //Data
      editor:null,
      description:null,

      //Function
      onPublishClicked(){
        editor.save().then((outputData) => {
          window.livewire.emit('publishClicked',outputData);
        }).catch((error) => {
          console.log('Saving failed: ', error)
        });
      },

      onUploadImage(){
        let inputFile = document.getElementById('image');
        let file = inputFile.files[0];
        let reader = new FileReader();
        reader.onload = ()=>{
            window.livewire.emit('imageUploaded',reader.result)
        }
        reader.readAsDataURL(file);
      },

      mountEditorJs(){
          editor = new EditorJS({
          holder: 'editorjs',

          tools:{
            delimiter: Delimiter,
            code: CodeTool,
            raw: RawTool,
            image:SimpleImage,
            // title:{
            //   class:Header,
            //   config: {
            //     placeholder: 'Enter a title',
            //     levels: [1],
            //     defaultLevel: 1
            //   }
            // },
            // subtitle:{
            //   class:Header,
            //   config: {
            //     placeholder: 'Enter a sub-title',
            //     levels: [3],
            //     defaultLevel: 3
            //   },
            // },
            header:{
              class:Header,
              config: {
                placeholder: 'Enter a header',
                levels: [4, 5, 6],
                defaultLevel: 4
              }
            },
            paragraph: {
              class: Paragraph,
              inlineToolbar: true,
            },
            quote: {
              class: Quote,
              inlineToolbar: true,
              shortcut: 'CMD+SHIFT+O',
              config: {
                quotePlaceholder: 'Enter a quote',
                captionPlaceholder: 'Quote\'s author',
              },
            },
            warning: {
              class: Warning,
              inlineToolbar: true,
              shortcut: 'CMD+SHIFT+W',
              config: {
                titlePlaceholder: 'Title',
                messagePlaceholder: 'Message',
              },
            },
            list: {
              class: List,
              inlineToolbar: true,
            },
            linkTool: {
              class: LinkTool,
              config: {
                endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching
              }
            },
            attaches: {
              class: AttachesTool,
              config: {
                endpoint: 'http://localhost:8008/uploadFile'
              }
            },
            embed: {
              class: Embed,
              inlineToolbar: true,
            },
            Marker: {
              class: Marker,
              shortcut: 'CMD+SHIFT+M',
            },
            inlineCode: {
              class: InlineCode,
              shortcut: 'CMD+SHIFT+M',
            },
          },

          placeholder: 'Let`s write an awesome story!',
          
          onReady: () => {
            new Undo({editor});     
          },

          save(blockContent){
            const input = blockContent.querySelector('input');

            return {
              url: input.value
            }
          },

          validate(savedData){
            if (!savedData.url.trim()){
              return false;
            }

            return true;
          },

          constructor({data}){
            this.data = data;
          },

          render(){
            const input = document.createElement('input');
            input.value = this.data && this.data.url ? this.data.url : '';
            return input;
          },
        });
      },
    }
  }

  $x = document.getElementById('publish_date');
  flatpickr($x,{});
</script>
@endsection