<div class="w-full max-w-xs m-auto">

  <form wire:submit.prevent="submit" class="flex flex-col max-w-lg  bg-white border border-black px-8 pt-6 pb-8 mb-4">
    <div>
      <label class="block text-gray-700 text-md font-bold mb-6">
        Login
      </label>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Email
      </label>
      <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        wire:model="email" type="text" placeholder="Email">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
        wire:model="password" type="password" placeholder="******************">
      @if ($errors->any())
      <p class="text-red-500 text-xs italic">{{ $errors->first() }}</p>
      @endif
    </div>
    <div class="flex items-center justify-between">
      <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit">
        Sign In
      </button>
    </div>
  </form>
  {{-- <p class="text-center text-gray-500 text-xs">
      &copy;2020 Acme Corp. All rights reserved.
    </p> --}}
</div>