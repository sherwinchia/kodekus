<div class="flex-1 container mx-auto flex justify-center items-center space-x-10">
  @if ($stage=='reset-form')
  <div class="auth-box flex flex-col max-w-xs  bg-white border border-black px-8 pt-6 pb-8 mb-4">
    <div>
      <label class="block text-gray-700 text-md font-bold mb-6">
        Reset Password
      </label>
    </div>
    <div class="flex flex-col space-y-2">
      <form class=" " wire:submit.prevent="resetPassword">
        <div class="input-group mb-1">
          <label class="text-sm" for="password">
            New Password
          </label>
          <input class="w-full" wire:model="password" type="password" placeholder="********">
        </div>
        <div class="input-group mb-1">
          <label class="text-sm" for="password">
            Confirm New Password
          </label>
          <input class="w-full" wire:model="password_confirmation" type="password" placeholder="********">
        </div>
        @if ($errors->any())
        <p class="text-red-500 text-xs italic mb-1">{{ $errors->first() }}</p>

        @endif
        <button id="reset-btn" wire:loading.attr="disabled"
          class="w-full flex justify-center items-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4"
          type="submit">
          Reset Password
          <span wire:loading wire:target="resetPassword"
            class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
        </button>
    </div>
  </div>
  @endif

  @if ($stage=='reset-success')
  <div class="flex flex-col max-w-lg  bg-white border border-black px-8 pt-6 pb-8 mb-4">
    <p class="mb-2">
      <b>Congratulations</b> you have successfully reset your password.
    </p>

    <a wire:click="login"
      class=" cursor-pointer w-full flex items-center justify-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4"
      type="submit">
      Login
    </a>
  </div>
  @endif
</div>