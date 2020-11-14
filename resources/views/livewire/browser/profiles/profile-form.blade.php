<div class="container mx-auto flex flex-col">
  <div class="flex flex-wrap lg:space-x-2 p-8 justify-center">
    <div class="border border-black p-6 w-full lg:w-3/6 mb-4 lg:mb-0">
      <label class="block text-black text-xl font-bold mb-2">Profile</label>
      <div class="">
        <form wire:submit.prevent="updateProfile" class="flex flex-wrap">
          <div class="input-group w-full">
            <label class="text-sm" for="image">Image</label>
            <img class="w-64 h-48 mx-auto object-contain overflow-hidden mb-2"
              src="{{ $temp_image ? $temp_image->temporaryUrl() : (isset($user) ? $user->profile->image_link: null) }}"
              alt="">
            <input class="w-full" type="file" wire:model="temp_image" accept="image/*" id="image">
            @error('temp_image') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pr-2">
            <label class="text-sm" for="first_name">First Name</label>
            <input class="w-full" wire:model="first_name" type="text">
            @error('first_name') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pl-2">
            <label class="text-sm" for="last_name">Last Name</label>
            <input class="w-full" wire:model="last_name" type="text">
            @error('last_name') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pr-2">
            <label class="text-sm" for="phone_number">Phone Number</label>
            <input class="w-full" wire:model="phone_number" type="text"
              oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            @error('phone_number') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pl-2">
            <label class="text-sm" for="email">Email</label>
            <input class="w-full" wire:model="email" type="email" disabled>
            @error('email') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pr-2">
            <label class="text-sm" for="birthdate">Birthdate</label>
            <input class="w-full" wire:model="birthdate" type="date">
            @error('birthdate') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          @if ($profile_msg)
          <div class="w-full">
            <span class="success-msg">{{ $profile_msg }}</span>
          </div>
          @endif
          <div class="w-full mt-2">
            <button type="submit" wire:loading.attr="disabled"
              class="w-full my-2 flex justify-center items-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4"
              type="submit">
              Update Profile
              <span wire:loading wire:target="updateProfile"
                class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="border border-black p-6 w-full lg:w-2/6 ">
      <label class="block text-black text-xl font-bold mb-2">Password</label>
      <div class="">
        <form wire:submit.prevent="updatePassword" class="flex-none flex flex-col justify-between">
          <div class="overflow-y-auto">
            <div class="input-group">
              <label class="text-sm" for="current_password">Current Password</label>
              <input class="w-full" wire:model="current_password" type="password">
              @error('current_password') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
            <div class="input-group">
              <label class="text-sm" for="new_password">New Password</label>
              <input class="w-full" wire:model="new_password" type="password">
              @error('new_password') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
            <div class="input-group">
              <label class="text-sm" for="confirm_password">Confirm New Password</label>
              <input class="w-full" wire:model="confirm_password" type="password">
              @error('confirm_password') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </div>
          @if ($password_msg)
          <span class="success-msg">{{ $password_msg }}</span>
          @endif
          <div class="mt-2">
            {{-- <button type="submit" class="p-4 border border-black outline-none">Change Password</button> --}}
            <button type="submit" wire:loading.attr="disabled"
              class="w-full my-2 flex justify-center items-center border border-black bg-white hover:bg-gray-200 text-black py-2 px-4"
              type="submit">
              Change Password

              <span wire:loading wire:target="updatePassword"
                class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>