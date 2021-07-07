<div class="container mx-auto flex flex-col">
  <div class=" flex flex-col p-8 justify-center">
    <div class="w-full card">
      <div class="card-header">
        <label class="text-center">Profile</label>
      </div>

      <div class="card-body">
        <form wire:submit.prevent="updateProfile" class="flex flex-wrap">
          <div class="input-group w-full">
            <label for="image">Profile Image</label>
            <img class="w-64 h-48 mx-auto object-contain overflow-hidden mb-2"
              src="{{ $temp_image ? $temp_image->temporaryUrl() : (isset($user) ? $user->profile->image_link: null) }}"
              alt="">
            <input type="file" wire:model="temp_image" accept="image/*" id="image">
            @error('temp_image') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pr-2">
            <label for="first_name">First Name</label>
            <input wire:model="first_name" wire:input="nameAdded" type="text">
            @error('first_name') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pl-2">
            <label for="last_name">Last Name</label>
            <input wire:model="last_name" wire:input="nameAdded" type="text">
            @error('last_name') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pr-2">
            <label for="phone_number">Phone Number</label>
            <input wire:model="phone_number" type="text"
              oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            @error('phone_number') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pl-2">
            <label for="email">Email</label>
            <input wire:model="email" type="email" disabled>
            @error('email') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pr-2">
            <label for="slug">Slug</label>
            <input wire:model="slug" type="text">
            @error('slug') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pl-2">
            <label for="birthdate">Birthdate</label>
            <input wire:model="birthdate" type="date">
            @error('birthdate') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-full">
            <label for="bio">Bio</label>
            <textarea wire:model="bio"></textarea>
            @error('bio') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pr-2">
            <label for="facebook_link ">Facebook link</label>
            <input wire:model="facebook_link" type="text">
            @error('facebook_link') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pl-2">
            <label for="twitter_link ">Twitter link</label>
            <input wire:model="twitter_link" type="text">
            @error('twitter_link') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pr-2">
            <label for="instagram_link">Instagram link</label>
            <input wire:model="instagram_link" type="text">
            @error('instagram_link') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div class="input-group w-1/2 pl-2">
            <label for="youtube_link">Youtube link</label>
            <input wire:model="youtube_link" type="text">
            @error('youtube_link') <span class="error-msg">{{ $message }}</span> @enderror
          </div>

          <div class="w-full mt-2">
            <button type="submit">Update</button>
          </div>
        </form>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <label class="text-center">Password</label>
      </div>
      <div class="card-body">
        <form wire:submit.prevent="updatePassword" class="flex-none flex flex-col justify-between">
          <div class="overflow-y-auto">
            <div class="input-group">
              <label for="current_password">Current Password</label>
              <input wire:model="current_password" type="password">
              @error('current_password') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
            <section>
              <div class="input-group">
                <label for="new_password">New Password</label>
                <input wire:model="new_password" type="password">
                @error('new_password') <span class="error-msg">{{ $message }}</span> @enderror
              </div>
            </section>
            <section>
              <div class="input-group">
                <label for="confirm_password">Confirm New Password</label>
                <input wire:model="confirm_password" type="password">
                @error('confirm_password') <span class="error-msg">{{ $message }}</span> @enderror
              </div>
            </section>
          </div>
          <div class="mt-2">
            <button type="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>