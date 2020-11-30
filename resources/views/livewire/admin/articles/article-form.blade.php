<div class="flex-1 flex article-form overflow-y-hidden">
  <div wire:ignore class="flex-1 py-3 article-left overflow-y-auto">
    <div wire:key="editorJs" x-data="formComponents()" id="editorjs"
      x-init="mountEditorJs( {{ isset($article->body) ? $article->body : '' }})">
    </div>
  </div>
  <div x-data="{rightPanelVisible:true}" class="flex">
    <div class=" w-6 flex justify-center items-center cursor-pointer" @click="rightPanelVisible=!rightPanelVisible">
      <i class="fas fa-caret-left " x-show="!rightPanelVisible"></i>
      <i class="fas fa-caret-right" x-show="rightPanelVisible"></i>
    </div>
    <div x-cloack x-show.transition.origin.right="rightPanelVisible"
      class="flex-none article-right flex flex-col justify-between border-t">
      <div class="overflow-y-auto">
        <section>
          <div class="input-group">
            <label for="title">Title</label>
            <input wire:model="title" wire:input="titleAdded" type="text" id="title" maxlength="80">
            <p class="text-xs text-gray-600">{{ strlen($title) }}/80</p>
            @error('title') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="description">Description</label>
            <textarea wire:model="description" type="text" maxlength="200"></textarea>
            <p class="text-xs text-gray-600">{{ strlen($description) }}/200</p>
            @error('description') <span class="error-msg">{{ $message }}</span> @enderror
          </div>

        </section>

        <section>
          <div class="input-group">
            <label for="image">Image</label>
            <img class="w-64 h-48 mx-auto object-contain overflow-hidden"
              src="{{ $temp_image ? $temp_image->temporaryUrl() : (isset($article) ? $article->image_link: null) }}"
              alt="">
            <input type="file" wire:model="temp_image" accept="image/*" id="image">
            @error('temp_image') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="slug">Slug </label>
            <input id="slug" pattern="^[a-z0-9-]+$" type="text" wire:model="slug">
            @error('slug') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="category">Category</label>
            <select wire:model="category_id">
              <option value="null">Choose one category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="series">Series <span class="font-light italic">(optional)</span></label>
            <select wire:model="series_id">
              <option value="null">Choose one series</option>
              @foreach ($series as $serie)
              <option value="{{ $serie->id }}">{{ $serie->name }}</option>
              @endforeach
            </select>
            @error('series_id') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="tags">Tags</label>
            <select wire:model="tags" multiple>
              <option value="null">Choose one tag</option>
              @foreach ($defaultTags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->name }}</option>
              @endforeach
            </select>
            @error('tags') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="publish_date">Publish Date</label>
            <input type="datetime-local" wire:model="publish_date">
            @error('publish_date') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="published">Published</label>
            <input class="w-full h-10" type="checkbox" wire:model="published">
            @error('published') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="featured">Featured</label>
            <input class="w-full h-10" type="checkbox" wire:model="featured">
            @error('featured') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
        </section>

        <section>
          <div class="input-group">
            <label for="trending">Trending</label>
            <input class="w-full h-10" type="checkbox" wire:model="trending">
            @error('trending') <span class="error-msg">{{ $message }}</span> @enderror
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
        <button x-on:click.prevent="onPublishClicked()" class="w-full py-4">{{ $buttonText }}</button>
      </div>
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
          let data = JSON.stringify(outputData);
          let readData = outputData;
          let blocks = outputData.blocks;

          blocks.forEach((block, index) => {
            if (block.type == 'image') {
              readData.blocks.splice(index,1)
            }
          });

          window.livewire.emit('publishClicked',data, JSON.stringify(readData));
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
            title:{
              class:Header,
              shortcut: 'CMD+SHIFT+F',
              config: {
                placeholder: 'Enter a title',
                levels: [4],
                defaultLevel: 4
              }
            },
            subtitle:{
              class:Header,
              shortcut: 'CMD+SHIFT+G',
              config: {
                placeholder: 'Enter a sub title',
                levels: [5],
                defaultLevel: 5
              },
            },
            header:{
              class:Header,
              shortcut: 'CMD+SHIFT+H',
              config: {
                placeholder: 'Enter a custom header',
                levels: [1,2,3, 4, 5, 6],
                defaultLevel: 4
              }
            },
            paragraph: {
              class: Paragraph,
              inlineToolbar: true,
            },
            delimiter: Delimiter,
            code: CodeTool,
            image: SimpleImage,
            quote: {
              class: Quote,
              inlineToolbar: true,
              shortcut: 'CMD+SHIFT+O',
              config: {
                quotePlaceholder: 'Enter a quote',
                captionPlaceholder: 'Quote\'s author',
              },
            },
            alert: {
              class: Alert,
              inlineToolbar: true,
              shortcut: 'CMD+SHIFT+A',
              config: {
                defaultType: 'primary',
                messagePlaceholder: 'Enter something',
              },
            },
            list: {
              class: List,
              inlineToolbar: true,
            },
            // linkTool: {
            //   class: LinkTool,
            //   config: {
            //     endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching
            //   }
            // },
            attaches: {
              class: AttachesTool,
              config: {
                endpoint: 'http://localhost:8008/uploadFile'
              }
            },
            embed: Embed,
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