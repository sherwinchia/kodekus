<div class="data-table" x-data="tableComponents()" x-init="setDefaults()">
  <div class="top">
    <div class="flex justify-between mb-2">
      <div>
        <input wire:model="search" class="border outline-none px-4 py-2 rounded tracking-wide" type="text"
          placeholder="Search">
        <select class="px-2 py-2 border rounded bg-white outline-none" wire:model="perPage">
          <option value="10">10</option>
          <option value="15">15</option>
          <option value="20">20</option>
        </select>
      </div>
      <a href="{{ route('admin.categories.create') }}" role="button">Create</a>
    </div>
  </div>
  <div class="bottom">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="text-left">
            <a wire:click.prevent="sortBy('id')" role="button">ID</a>
          </th>
          <th class="text-left">
            <a wire:click.prevent="sortBy('name')" role="button">Name</a>
          </th>
          {{-- <th>
            <a wire:click.prevent="sortBy('published')" role="button">Published</a>
          </th> --}}
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($categories as $category)
        <tr>
          <td class="px-6 py-4 whitespace-no-wrap border-b">
            <div class="flex items-center">
              <div>
                <div class="text-sm leading-5 text-gray-800">{{ $category->id }}</div>
              </div>
            </div>
          </td>
          <td class="non-id">
            {{ $category->name }}
          </td>
          {{-- <td class="non-id text-center">
            {{ $category->published }}
          </td> --}}
          <td class="non-id">
            <div class="flex justify-center text-gray-600">
              <a class="mx-1 text-lg" role="button" href="{{ route('admin.categories.edit', $category->id) }}">
                <i class="fas fa-edit"></i>
              </a>
              <a class="mx-1 text-lg" role="button" wire:click="$emit('onTrashIcon',{{ $category->id }})">
                <i class="fas fa-trash"></i>
              </a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
      <div>
        <p class="text-sm leading-5">
          Showing
          <span class="font-medium">{{ $categories->firstItem() }}</span>
          to
          <span class="font-medium">{{ $categories->lastItem() }}</span>
          of
          <span class="font-medium">{{ $categories->total() }}</span>
          results
        </p>
      </div>
      <div class="inline-block">
        {{ $categories->links() }}
      </div>
    </div>
  </div>

  <div class="mx-auto w-full bg-gray-100 flex items-center justify-center" @keydown.escape="confirmationModal = false"
    x-cloak>
    <section class="flex flex-wrap p-4 h-full items-center">
      <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="confirmationModal"
        :class="{ 'absolute inset-0 z-10 flex items-center justify-center': confirmationModal }">
        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6"
          x-show="confirmationModal" @click.away="confirmationModal = false">

          <div class="flex justify-between items-center pb-3">
            <p x-text="modalHeader" class="text-2xl font-bold">Are you sure ?</p>
          </div>

          <p x-text="modalBody"></p>

          <div class="flex justify-end pt-2">
            <button class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2"
              x-show="deleteButton" x-on:click.prevent="onDelete()">Delete</button>
            <button class="modal-close px-4 bg-red-500 p-3 rounded-lg text-white hover:bg-red-400"
              x-on:click="onModalClose()" x-text="cancelButton"></button>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

@section('scripts')
<script>
  function tableComponents(){
      return{
        //data
        modalHeader : '',
        modalBody : '',
        confirmationModal: false, 
        deleteButton : true,
        cancelButton : '',
        id: null ,

        //function
        setDefaults(){
          this.modalHeader = 'Are you sure?';
          this.modalBody = 'This action can not be recovered!';
          this.cancelButton = 'Cancel';
          this.deleteButton = true;
          this.listen();
        },

        onDelete(){
          window.livewire.emit('delete',this.id);
          this.modalHeader = 'Deleted!';
          this.modalBody = 'The row has been deleted.';
          this.cancelButton = 'Close';
          this.deleteButton = false;
        },

        onModalClose(){
          this.setDefaults();
          this.confirmationModal = false;
        },

        listen() {
          window.livewire.on('onTrashIcon', categoryId => {
            this.id = categoryId;
            this.confirmationModal = true;
          })
        }
      }
    }

</script>
@endsection