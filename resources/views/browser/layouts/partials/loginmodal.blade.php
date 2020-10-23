<div id="login-modal" class="fixed top-0 mx-auto w-full h-full bg-gray-100 items-center justify-center hidden">
  <div class="flex flex-col justify-center overflow-auto h-full w-full" style="background-color: rgba(0,0,0,0.5)"
    :class="">
    <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6">
      <div class="flex flex-col justify-center items-center">
        <p class="text-2xl font-bold">Login in to continue</p>
        <div class="flex flex-col">
          <button><a href="{{ route('browser.login.show') }}">Login</a></button>
          <button><a href="{{ route('browser.login.show') }}">Sign Up</a></button>
          <button id="close-login-modal-button">Close</button>
        </div>
      </div>
      <p>
      </p>
    </div>
  </div>

</div>