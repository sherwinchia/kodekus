<div class="flex-1 flex justify-center overflow-y-hidden">
  <div class="card w-full max-w-xl">
    <div class="card-header">
      <p>Update Page - {{ $page->name }}</p>
    </div>
    <div class="card-body">
      <form wire:submit.prevent="submit" class="flex-none flex flex-col justify-between">
        <div class="overflow-y-auto">
          <section>
            <template x-for="(social,index) in content.socials" :key="index">
              <div class="card">
                <div class="card-body">
                  <div class="flex flex-wrap">
                    <div class="input-group w-1/2 pr-2">
                      <label for="name">Name</label>
                      <input x-model="social.name" type="text" id="name" maxlength="80">
                    </div>
                    <div class="input-group w-1/2 pl-2">
                      <label for="icon">Icon</label>
                      <input x-model="social.icon" type="text" id="icon" maxlength="80">
                    </div>
                    <div class="input-group w-1/2 pr-2">
                      <label for="color">Color</label>
                      <input x-model="social.color" type="text" id="color" maxlength="80">
                    </div>
                    <div class="input-group w-1/2 pl-2">
                      <label for="link">Link</label>
                      <input x-model="social.link" type="text" id="link" maxlength="80">
                    </div>
                  </div>
                  <button type="button" x-on:click="removeRow(index)" class="close w-0" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </template>
          </section>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- @section('scripts')
<script>
  function formComponents(){
  return {
      //data
      content: [],

      //method
      setDefaults(content){
        this.content = content;
      },

      addRow(index){
        this.content.push();
      },

      removeRow(index){
        this.content = this.content.splice(index, 1);
      }
    }
  }
</script>
@endsection --}}