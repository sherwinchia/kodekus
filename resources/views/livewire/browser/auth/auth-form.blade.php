<div class="flex-1 container mx-auto flex justify-center items-center space-x-10">

  @if ($form == 'login')
  <div class="flex flex-col max-w-lg  bg-white border border-black px-8 pt-6 pb-8 mb-4">
    <div>
      <label class="block text-gray-700 text-md font-bold mb-6">
        Login
      </label>
    </div>

    <div class="flex flex-col space-y-2">
      <form class="border-b border-black pb-4 mb-2" wire:submit.prevent="login">
        <div class="input-group">
          <label class="block text-gray-700 text-sm font-bold" for="username">
            Email
          </label>
          <input wire:model="email" type="text" placeholder="Email">
        </div>
        <div class="input-group">
          <label class="block text-gray-700 text-sm font-bold" for="password">
            Password
          </label>
          <input class="" wire:model="password" type="password" placeholder="******************">
          @if ($errors->any())
          <p class="text-red-500 text-xs italic">{{ $errors->first() }}</p>
          @endif
        </div>
        <button class="w-full border border-black bg-white hover:bg-gray-200 text-black py-2 px-4" type="submit">
          Sign In
        </button>
        <div class="mt-2">
          Don't have account? <a class="cursor-pointer hover:underline" wire:click="changeForm('register')">Register
            here</a>
        </div>
      </form>
      <a href="{{ route('browser.login.socialite', 'google') }}"
        class="flex space-x-2 items-center w-full cursor-pointer bg-red-500 hover:bg-red-700 text-white py-2 px-4 focus:outline-none focus:shadow-outline">
        <i class="fab fa-google w-6 border-r border-white pr-2"></i>
        <div>Continue with Google</div>
      </a>
      <a href="{{ route('browser.login.socialite', 'facebook') }}"
        class="flex space-x-2 items-center w-full cursor-pointer bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 focus:outline-none focus:shadow-outline">
        <i class="fab fa-facebook-f w-6 border-r border-white pr-2"></i>
        <div>Continue with Facebook</div>
      </a>
    </div>
  </div>
  @endif

  @if ($form == 'register')
  <div class="flex flex-col max-w-lg  bg-white border border-black px-8 pt-6 pb-8 mb-4">
    <div>
      <label class="block text-gray-700 text-md font-bold mb-6">
        Register
      </label>
    </div>

    <div class="flex flex-col space-y-2">
      <form class="border-b border-black pb-4 mb-2" wire:submit.prevent="register">
        <div class="input-group">
          <label class="block text-gray-700 text-sm font-bold" for="username">
            First Name
          </label>
          <input wire:model="first_name" type="text" placeholder="First Name">
        </div>
        <div class="input-group">
          <label class="block text-gray-700 text-sm font-bold" for="username">
            Last Name
          </label>
          <input wire:model="last_name" type="text" placeholder="Last Name">
        </div>
        <div class="input-group">
          <label class="block text-gray-700 text-sm font-bold" for="username">
            Email
          </label>
          <input wire:model="email" type="text" placeholder="Email">
        </div>
        <div class="input-group">
          <label class="block text-gray-700 text-sm font-bold" for="password">
            Password
          </label>
          <input class="" wire:model="password" type="password" placeholder="******************">
        </div>
        <div class="input-group">
          <label class="block text-gray-700 text-sm font-bold" for="password">
            Confirm Password
          </label>
          <input class="" wire:model="password_confirmation" type="password" placeholder="******************">
          @if ($errors->any())
          <p class="text-red-500 text-xs italic">{{ $errors->first() }}</p>
          @endif
        </div>
        <button class="w-full border border-black bg-white hover:bg-gray-200 text-black py-2 px-4" type="submit">
          Register
        </button>

        <div class="mt-2">
          Already registered? <a class="cursor-pointer hover:underline" wire:click="changeForm('login')">Login
            here</a>
        </div>
      </form>
      <a href="{{ route('browser.login.socialite', 'google') }}"
        class="flex space-x-2 items-center w-full cursor-pointer bg-red-500 hover:bg-red-700 text-white py-2 px-4 focus:outline-none focus:shadow-outline">
        <i class="fab fa-google w-6 border-r border-white pr-2"></i>
        <div>Continue with Google</div>
      </a>
      <a href="{{ route('browser.login.socialite', 'facebook') }}"
        class="flex space-x-2 items-center w-full cursor-pointer bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 focus:outline-none focus:shadow-outline">
        <i class="fab fa-facebook-f w-6 border-r border-white pr-2"></i>
        <div>Continue with Facebook</div>
      </a>
    </div>
  </div>
  @endif


</div>