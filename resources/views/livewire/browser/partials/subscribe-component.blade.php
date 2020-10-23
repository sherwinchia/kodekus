<div class="subscribe-form">
  @if (!current_user() || (current_user() && !current_user()->subscribeToNewsletter()))
  <div class="flex items-center border-b border-black">
    <i class="far fa-newspaper mr-2"></i>
    <h5 class="font-bold text-lg uppercase text-black mr-2">Berlangganan</h5>
  </div>
  <p class="mb-2">
    Dapatkan informasi terbaru dari brand dengan berlangganan newsletter.
  </p>

  <div class="input-group mb-2">
    <label for="name">
      Nama
    </label>
    <input wire:model.debounce="name" type="text" placeholder="John Doe" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode == 32)"
      class="text-black bg-white rounded-t hover:outline-none p-2 w-full border border-black" />
    @error('name') <span class="text-red-600 font-normal">{{ $message }}</span> @enderror
  </div>
  <div class="input-group mb-4">
    <label for="email">
      Email
    </label>
    <input wire:model.debounce="email" type="email" placeholder="john_doe@gmail.com"
      class="text-black bg-white rounded-t hover:outline-none p-2 w-full border border-black" />
    @error('email') <span class="text-red-600 font-normal">{{ $message }}</span> @enderror
  </div>

  @if ($success_message)
  <span class="text-green-600 font-normal">{{ $success_message }}</span>
  @endif

  <button wire:click="subscribe" wire:loading.attr="disabled" type="button"
    class="px-4 py-2 bg-white border-black border text-black rounded w-full tracking-wide">
    Daftar
  </button>
  @endif
</div>