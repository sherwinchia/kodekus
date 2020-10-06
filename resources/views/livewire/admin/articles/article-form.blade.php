<div class="flex-1 flex article-form overflow-y-hidden">
  <div wire:ignore class="flex-1 py-3 article-left overflow-y-auto">
    <div wire:key="editorJs" x-data="formComponents()" id="editorjs"
      x-init="mountEditorJs( {{ isset($article->body) ? $article->body : '' }})">
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
          <label for="category">Category</label>
          <select wire:model="category">
            <option selected="selected" disabled>Choose one category</option>
            @foreach ($categories as $category)
            <option>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
      </section>

      {{-- <section>
        <div class="input-group">
          <select multiple="multiple" name="sports[]" id="sports">
            @foreach($aSports as $aKey => $aSport)
            @foreach($aItem->sports as $aItemKey => $aItemSport)
            <option value="{{$aKey}}" @if($aKey==$aItemKey)selected="selected" @endif>{{$aSport}}</option>
      @endforeach
      @endforeach
      </select>
    </div>
    </section> --}}

    <section>
      <div class="input-group">
        <label for="tags">Tags</label>
        <select wire:model="tag">
          <option selected="selected" disabled>Choose one tag</option>
          @foreach ($tags as $tag)
          <option>{{ $tag->name }}</option>
          @endforeach
        </select>
      </div>
    </section>

    <section>
      <div class="input-group">
        <label for="publish_date">Publish Date</label>
        <input type="datetime-local" wire:model="publish_date">
      </div>
    </section>

    <section>
      <div class="input-group">
        <label for="published">Published</label>
        <input class="w-full h-10" type="checkbox" wire:model="published">
      </div>
    </section>

    <section>
      <div class="input-group">
        <label for="featured">Featured</label>
        <input class="w-full h-10" type="checkbox" wire:model="featured">
      </div>
    </section>

    <section>
      <div class="input-group">
        <label for="trending">Trending</label>
        <input class="w-full h-10" type="checkbox" wire:model="trending">
      </div>
    </section>
  </div>

  <div x-data="formComponents()">
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-2">
      <strong class="font-bold">Error!</strong>
      <span class="block sm:inline">{{ $errors->first() }}</span>
    </div>
    @endif
    <button x-on:click.prevent="onPublishClicked()"
      class="w-full p-4 bg-green-200 outline-none">{{ $buttonText }}</button>
  </div>
</div>
</div>




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

      mountEditorJs(data){
          editor = new EditorJS({
          holder: 'editorjs',

          tools:{
            delimiter: Delimiter,
            code: CodeTool,
            raw: RawTool,
            image: {
            class: SimpleImage,
            inlineToolbar: true
            },
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

          data:data,

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
</script>
@endsection