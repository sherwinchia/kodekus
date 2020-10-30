<div class="subscribe-form bg-gray-200 p-4 rounded-md mb-8">
  <div class="flex items-center border-b border-black py-2 mb-2">
    <h5 class="font-semibold tracking-wider font-roboto text-xl uppercase text-black">Subscribe</h5>
  </div>
  <p class="mb-2">
    Dapatkan update terbaru dari {{ config('app.name') }} dengan berlangganan newsletter gratis.
  </p>

  <div class="input-group mb-2">
    <label for="name">
      Nama
    </label>
    <input wire:model.debounce="name" type="text" placeholder="John Doe" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode == 32)"
      class=" text-black bg-white hover:outline-none p-2 w-full " />
    @error('name') <span class="error-msg">{{ $message }}</span> @enderror
  </div>
  <div class="input-group mb-4">
    <label for="email">
      Email
    </label>
    <input wire:model.debounce="email" type="email" placeholder="john_doe@gmail.com"
      class="text-black bg-white hover:outline-none p-2 w-full " />
    @error('email') <span class="error-msg">{{ $message }}</span> @enderror
  </div>

  @if ($success_message)
  <span class="success-msg">{{ $success_message }}</span>
  @endif

  <div class="flex justify-center">
    <button id="subscribe-btn" wire:click="subscribe" wire:loading.attr="disabled" type="button"
      class="px-4 py-2 bg-white border-black border text-black rounded  tracking-wide">
      Daftar
      <span wire:loading wire:target="subscribe"
        class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-black ml-2"></span>
    </button>
  </div>

</div>