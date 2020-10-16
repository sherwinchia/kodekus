<div class="flex-1 flex article-form overflow-y-hidden">
  <form wire:submit.prevent="submit" class="flex-none article-right flex flex-col justify-between">
    <div class="overflow-y-auto">
      <section>
        <div class="input-group">
          <label for="name">Name</label>
          <input wire:model="name" type="text" id="name" maxlength="80">
        </div>
      </section>
    </div>

    <div>
      @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-2">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ $errors->first() }}</span>
      </div>
      @endif
      <button type="submit" class="w-full p-4 bg-green-200 outline-none">{{ $buttonText }}</button>
    </div>
  </form>
</div>