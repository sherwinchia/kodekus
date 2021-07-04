<div class="w-full max-w-xs m-auto">

  <form wire:submit.prevent="submit" class="flex flex-col max-w-lg  bg-white border border-black px-8 pt-6 pb-8 mb-4">
    <div>
      <label class="block text-black text-md font-bold mb-6">
        Login
      </label>
    </div>
    <div class="mb-2 ">
      <label class="block text-black mb-2" for="username">
        Email
      </label>
      <input tabindex="1" class="w-full border border-black rounded-none p-2 focus:outline-none" wire:model="email" type="text"
        placeholder="Email">
    </div>
    <div class="mb-4 ">
      <label class="block text-black mb-2" for="password">
        Password
      </label>
      <input tabindex="2" class=" w-full border border-black rounded-none p-2 focus:outline-none" wire:model="password"
        type="password" placeholder="******************">
      @if ($errors->any())
      <p class="text-red-500 text-xs italic">{{ $errors->first() }}</p>
      @endif
    </div>
    <div class="flex items-center justify-between">
      <button tabindex="3" class="w-full border border-black rounded-none bg-white text-black text-lg font-normal hover:bg-gray-200"
        type="submit" wire:loading.attr="disabled">
        Sign In
        <span wire:loading wire:target="submit"
          class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
      </button>
    </div>
  </form>
</div>