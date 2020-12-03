<div class="flex-1 container mx-auto flex justify-center items-center space-x-10">
  <div class="auth-box flex flex-col max-w-xs  bg-white border border-black px-5 pt-6 pb-5 mb-4">
    <div>
      <label class="block text-black text-xl font-bold mb-4">
        Activate Account
      </label>
    </div>

    <button id="resend-btn" wire:loading.attr="disabled" wire:click.prevent="resend"
      class="w-full my-2 flex justify-center items-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4">
      Resend Activation Email
      <span wire:loading wire:target="resend"
        class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
    </button>

    <button id="logout-btn" wire:loading.attr="disabled" wire:click.prevent="logout"
      class="w-full my-2 flex justify-center items-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4">
      Logout
      <span wire:loading wire:target="logout"
        class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
    </button>

    @if (isset($message))
    <p class="success-msg mb-1">{{ $message }}</p>
    @endif
  </div>
</div>