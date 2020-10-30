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
          <p class="error-msg mb-1">{{ $errors->first() }}</p>
          @endif
        </div>
        <button id="signin-btn" wire:loading.attr="disabled"
          class="w-full flex justify-center items-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4"
          type="submit">
          Sign In
          <span wire:loading wire:target="login"
            class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
        </button>
        <div class="mt-2 text-sm italic">
          Don't have account? <a class="cursor-pointer not-italic hover:underline"
            wire:click="changeForm('register')">Register
            here</a>
        </div>
        <div class="mt-2 text-sm italic cursor-pointer">
          <a class=" hover:underline" wire:click="changeForm('forgot-password')">
            Forgot password?
          </a>
        </div>
      </form>
      <a href="{{ route('browser.login.socialite', 'google') }}"
        class="flex space-x-2 items-center w-full cursor-pointer bg-red-500 hover:bg-red-700 text-white py-2 px-4 focus:outline-none focus:shadow-outline">
        <i class="fab fa-google w-6 border-r border-white pr-2"></i>
        <div>Continue with Google</div>
      </a>
      <a href="{{ route('browser.login.socialite', 'facebook') }}" class="flex space-x-2 items-center w-full cursor-pointer bg-blue-500 hover:bg-blue-700 text-white py-2 px-4
      focus:outline-none focus:shadow-outline">
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
          <p class="error-msg mb-1">{{ $errors->first() }}</p>
          @endif
        </div>
        <button id="register-btn" wire:loading.attr="disabled"
          class="w-full flex justify-center items-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4"
          type="submit">
          Register

          <span wire:loading wire:target="register"
            class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
        </button>

        <div class="mt-2 text-sm italic">
          Already registered?
          <a class="cursor-pointer hover:underline not-italic" wire:click="changeForm('login')">Login
            here</a>
        </div>
      </form>
      <a href="{{ route('browser.login.socialite', 'google') }}"
        class="flex space-x-2 items-center w-full cursor-pointer bg-red-500 hover:bg-red-700 text-white py-2 px-4 focus:outline-none focus:shadow-outline">
        <i class="fab fa-google w-6 border-r border-white pr-2"></i>
        <div>Continue with Google</div>
      </a>
      <a href="{{ route('browser.login.socialite', 'facebook') }}" class="flex space-x-2 items-center w-full cursor-pointer bg-blue-500 hover:bg-blue-700 text-white py-2 px-4
      focus:outline-none focus:shadow-outline">
        <i class="fab fa-facebook-f w-6 border-r border-white pr-2"></i>
        <div>Continue with Facebook</div>
      </a>
    </div>
  </div>
  @endif

  @if ($form == 'forgot-password')
  <div class="flex flex-col max-w-lg  bg-white border border-black px-8 pt-6 pb-8 mb-4">
    <div>
      <label class="block text-gray-700 text-md font-bold mb-6">
        Forgot Password
      </label>
    </div>
    <div class="flex flex-col space-y-2">
      <form class=" pb-4 mb-2" wire:submit.prevent="forgotPassword">
        <div class="input-group">
          <label class="block text-gray-700 text-sm font-bold" for="email">
            Email
          </label>
          <input class="" wire:model="forgotPasswordEmail" type="text" placeholder="john_doe@gmail.com">
          @if ($errors->any())
          <p class="error-msg mb-1">{{ $errors->first() }}</p>
          @endif
          @if ($forgotPasswordMessage)
          <p class="text-green-500 text-xs italic mb-1">{{ $forgotPasswordMessage }}</p>
          @endif
        </div>
        <button id="reset-btn" wire:loading.attr="disabled"
          class="w-full flex items-center justify-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4"
          type="submit">
          Reset Password
          <span wire:loading wire:target="forgotPassword"
            class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
        </button>
        <div class="mt-2 text-sm italic">
          Login?
          <a class="cursor-pointer hover:underline not-italic" wire:click="changeForm('login')">Login
            here</a>
        </div>
      </form>
    </div>
  </div>
  @endif

  @if ($stage == 'registered')
  <div class="flex flex-col max-w-lg  bg-white border border-black px-8 pt-6 pb-8 mb-4">
    <p class="mb-2">
      <b>Congratulations</b> you have successfully registered. An email have been sent to your email for activation.
      Activate your account to enable bookmarks feature.
    </p>

    <a href="{{ route('browser.home.index') }}"
      class="w-full flex items-center justify-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4"
      type="submit">
      Home
    </a>
  </div>
  @endif

</div>