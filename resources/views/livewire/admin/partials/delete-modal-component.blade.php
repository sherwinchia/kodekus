<div x-cloack x-data="modalComponent()" x-init="setDefaults()"
  class="mx-auto w-full bg-gray-100 flex items-center justify-center" @keydown.escape="confirmationModal = false"
  x-cloak>
  <section class="flex flex-wrap p-4 h-full items-center">
    <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="confirmationModal"
      :class="{ 'absolute inset-0 z-10 flex items-center justify-center': confirmationModal }">
      <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="confirmationModal"
        @click.away="confirmationModal = false">

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

@section('scripts')
<script>
  function modalComponent(){
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
          livewire.on('triggerConfirmationModal', id => {
            console.log(id);
            this.id = id;
            this.confirmationModal = true;
          })
        }
      }
    }

</script>
@endsection