<div class="flex-1 flex justify-center overflow-y-hidden">
  <div class="card w-full max-w-xl">
    <div class="card-header">
      <p>{{ $buttonText }} User</p>
    </div>
    <div class="card-body">
      <form wire:submit.prevent="submit" class="flex-none flex flex-col justify-between">
        <div class="overflow-y-auto">
          <section>
            <div class="input-group">
              <label for="first_name">First Name</label>
              <input wire:model="first_name" wire:input="nameAdded" type="text">
              @error('first_name') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>
          <section>
            <div class="input-group">
              <label for="last_name">Last Name</label>
              <input wire:model="last_name" wire:input="nameAdded" type="text">
              @error('last_name') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>

          <section>
            <div class="input-group">
              <label for="slug">Slug</label>
              <input wire:model="slug" type="text">
              @error('slug') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>

          @if ($edit)
          <section>
            <div class="input-group">
              <label for="email">Email</label>
              <input wire:model="email" type="email" disabled>
              @error('email') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>
          @else
          <section>
            <div class="input-group">
              <label for="email">Email</label>
              <input wire:model="email" type="email">
              @error('email') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>
          @endif

          <section>
            <div class="input-group">
              <label for="name">Role</label>
              <select wire:model="role">
                <option value="null" disabled>Choose one role</option>
                @foreach ($roles as $role)
                <option>{{ $role->name }}</option>
                @endforeach
              </select>
              @error('role') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>

          <section>
            <div class="input-group">
              <label for="password">Password</label>
              <input wire:model="password" type="text">
              @error('password') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>

        </div>
        <div>
          @if ($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-2">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
          </div>
          @endif
          <button type="submit" class="w-full p-4 bg-green-200 outline-none">{{ $buttonText }}</button>
        </div>
      </form>
    </div>
  </div>
</div>