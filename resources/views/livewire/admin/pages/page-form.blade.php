<div class="flex-1 flex justify-center overflow-y-hidden">
  <div class="card w-full max-w-xl">
    <div class="card-header">
      <p>Update Page - {{ $page->name }}</p>
    </div>
    <div class="card-body">
      <form wire:submit.prevent="updateSocial" class="flex-none flex flex-col justify-between">
        <div class="overflow-y-auto">
          @if ($type == 'Social')
          @foreach ($socials as $index => $social)
          <div class="border border-gray-400 rounded-lg p-4 mb-4">
            <div class="card-body flex">
              <div class="flex flex-wrap">
                <div class="input-group w-1/2 pr-2">
                  <label for="name">Name</label>
                  <input wire:model="socials.{{ $index }}.name" type="text" id="name" maxlength="80">
                </div>
                <div class="input-group w-1/2 pl-2">
                  <label for="icon">Icon <span class="font-light italic">(fontawesome 6)</span></label>
                  <input wire:model="socials.{{ $index }}.icon" type="text" id="icon" maxlength="80">
                </div>
                <div class="input-group w-1/2 pr-2">
                  <label for="color">Color <span class="font-light italic">(hexcode)</span></label>
                  <input wire:model="socials.{{ $index }}.color" type="text" id="color" maxlength="80">
                </div>
                <div class="input-group w-1/2 pl-2">
                  <label for="link">Link</label>
                  <input wire:model="socials.{{ $index }}.link" type="text" id="link" maxlength="80">
                </div>
                <div class="input-group w-1/2">
                  <label for="display">Display</label>
                  <input class="w-8 h-8" type="checkbox" wire:model="socials.{{ $index }}.display">
                </div>
              </div>
              <div class="m-2">
                <button class="" type="button" wire:loading.attr="disabled" wire:click="removeSocial({{ $index }})"
                  class="close w-0" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div>
          @endforeach
          @if ($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded my-2">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
          </div>
          @elseif($successMsg)
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded my-2">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ $successMsg }}</span>
          </div>
          @endif
          <button class="" type="button" wire:loading.attr="disabled" wire:click="addSocial">Add</button>
          <button class="" type="submit" wire:loading.attr="disabled">Update</button>

          @elseif($type == 'Comment')
          <div class="flex justify-between items-center my-2">
            <div>Comment Approval</div>
            <input class="w-8 h-8" type="checkbox" wire:model="comment_approval">
          </div>
          @if($successMsg)
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-2 rounded">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ $successMsg }}</span>
          </div>
          @endif
          <button class="" type="button" wire:click="updateComment" wire:loading.attr="disabled">Update</button>

          @elseif($type == 'About')

          <div x-data="quillComponent()" x-init="setDefaults('{{ $about }}')" wire:ignore>
            <div class="mb-2">
              <div class="h-64" id="quillEditor">
              </div>
            </div>

            <button class="" type="button" x-on:click.prevent="onUpdateClick()">Update</button>
          </div>

          @if($successMsg)
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-2 rounded">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ $successMsg }}</span>
          </div>
          @endif

          @elseif($type == 'Meta')
          <div>
            @foreach ($metas as $index => $meta)
            <div class="border border-gray-400 rounded-lg p-4 mb-4">
              <div class="card-body flex">
                <div class="input-group w-full">
                  <label for="content">{{ $meta['name'] }}</label>
                  @if ($meta['name'] == 'Description')
                  <textarea class="w-full" wire:model="metas.{{ $index }}.content" name="description"
                    rows="4"></textarea>
                  @else
                  <input class="w-full" wire:model="metas.{{ $index }}.content" type="text" maxlength="80">
                  @endif
                </div>
              </div>
            </div>
            @endforeach
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded my-2">
              <strong class="font-bold">Error!</strong>
              <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
            @elseif($successMsg)
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded my-2">
              <strong class="font-bold">Success!</strong>
              <span class="block sm:inline">{{ $successMsg }}</span>
            </div>
            @endif
            <button class="" type="button" wire:click="updateMeta" wire:loading.attr="disabled">Update</button>
          </div>
          @endif

        </div>
      </form>
    </div>
  </div>
</div>

@section('scripts')
<script>
  function quillComponent(){
    return{
      //Data
      about: null,

      //Function
      setDefaults(data){
        let container = document.getElementById('quillEditor');
        quill = new Quill(container, {theme: 'snow'});
        quill.root.innerHTML = data;
        let _this = this;
        quill.on('text-change', function () {
          _this.about = quill.root.innerHTML;
        });
      },

      onUpdateClick(){
        window.livewire.emit('updateAbout',this.about);
      }
    }
  }
</script>
@endsection