<div class="container mx-auto flex flex-col">
  <div class="text-center">
    Update Profile
  </div>
  <div class="flex p-8 justify-center">

    <div class="card m-2">
      <label class="text-center">Profile</label>
      <form wire:submit.prevent="updateProfile" class="flex-none flex flex-col justify-between">
        <div class="overflow-y-auto">
          <div class="input-group">
            <label for="name">Name</label>
            <input wire:model="name" type="text">
          </div>
          <section>
            <div class="input-group">
              <label for="email">Email</label>
              <input wire:model="email" type="email">
            </div>
          </section>
        </div>
        <div>
          @if ($errors->has('name') || $errors->has('email'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-2">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
          </div>
          @endif
          <button type="submit" class="w-full p-4 bg-green-200 outline-none">Update</button>
        </div>
      </form>

    </div>
    <div class="card m-2">
      <label class="text-center">Password</label>
      <form wire:submit.prevent="updatePassword" class="flex-none flex flex-col justify-between">
        <div class="overflow-y-auto">
          <div class="input-group">
            <label for="current_password">Current Password</label>
            <input wire:model="current_password" type="password">
          </div>
          <section>
            <div class="input-group">
              <label for="new_password">New Password</label>
              <input wire:model="new_password" type="password">
            </div>
          </section>
          <section>
            <div class="input-group">
              <label for="confirm_password">Confirm New Password</label>
              <input wire:model="confirm_password" type="password">
            </div>
          </section>
        </div>
        <div>
          @if ($errors->has('current_password') || $errors->has('confirm_password') || $errors->has('new_password'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-2">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
          </div>
          @endif
          <button type="submit" class="w-full p-4 bg-green-200 outline-none">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>