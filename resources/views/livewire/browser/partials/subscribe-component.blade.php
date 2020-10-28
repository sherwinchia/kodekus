<div class="subscribe-form bg-gray-100 p-4 rounded border border-gray-300">
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
    @error('name') <span class="text-red-600 font-normal">{{ $message }}</span> @enderror
  </div>
  <div class="input-group mb-4">
    <label for="email">
      Email
    </label>
    <input wire:model.debounce="email" type="email" placeholder="john_doe@gmail.com"
      class="text-black bg-white hover:outline-none p-2 w-full " />
    @error('email') <span class="text-red-600 font-normal">{{ $message }}</span> @enderror
  </div>

  @if ($success_message)
  <span class="text-green-600 font-normal">{{ $success_message }}</span>
  @endif

  <div class="flex justify-center">
    <button wire:click="subscribe" wire:loading.attr="disabled" type="button"
      class="px-4 py-2 bg-white border-black border text-black rounded  tracking-wide">
      Daftar
    </button>
  </div>

</div>