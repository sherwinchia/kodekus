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
          <div class="card">
            <div class="card-body">
              <div class="flex flex-wrap">
                <div class="input-group w-1/2 pr-2">
                  <label for="name">Name</label>
                  <input wire:model="socials.{{ $index }}.name" type="text" id="name" maxlength="80">

                </div>
                <div class="input-group w-1/2 pl-2">
                  <label for="icon">Icon</label>
                  <input wire:model="socials.{{ $index }}.icon" type="text" id="icon" maxlength="80">

                </div>
                <div class="input-group w-1/2 pr-2">
                  <label for="color">Color</label>
                  <input wire:model="socials.{{ $index }}.color" type="text" id="color" maxlength="80">

                </div>
                <div class="input-group w-1/2 pl-2">
                  <label for="link">Link</label>
                  <input wire:model="socials.{{ $index }}.link" type="text" id="link" maxlength="80">

                </div>
              </div>
              <button class="" type="button" wire:loading.attr="disabled" wire:click="removeSocial({{ $index }})"
                class="close w-0" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
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
          @endif

        </div>
      </form>
    </div>
  </div>
</div>