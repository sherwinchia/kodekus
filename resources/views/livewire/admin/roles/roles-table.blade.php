<div class="data-table">
  <div class="top">
    <div class="flex justify-between mb-2">
      <div>
        <input wire:model="search" class="border outline-none px-4 py-2 rounded tracking-wide" type="text"
          placeholder="Search">
        <select class="px-2 py-2 border rounded bg-white outline-none" wire:model="perPage">
          <option value="10">10</option>
          <option value="15">15</option>
          <option value="20">20</option>
        </select>
      </div>
      <a href="{{ route('admin.roles.create') }}" role="button">Create</a>
    </div>
  </div>
  <div class="bottom">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="text-left">
            <a wire:click.prevent="sortBy('id')" role="button">ID</a>
            @include('admin.layouts.partials.sort-icon', ['field'=>'id'])
          </th>
          <th class="text-left">
            <a wire:click.prevent="sortBy('name')" role="button">Name</a>
            @include('admin.layouts.partials.sort-icon', ['field'=>'name'])
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($roles as $role)
        <tr>
          <td class="px-6 py-4 whitespace-no-wrap border-b">
            <div class="flex items-center">
              <div>
                <div class="text-sm leading-5 text-gray-800">{{ $role->id }}</div>
              </div>
            </div>
          </td>
          <td class="non-id">
            {{ $role->name }}
          </td>
          <td class="non-id">
            <div class="flex justify-center text-gray-600">
              <a class="mx-1 text-lg" role="button" href="{{ route('admin.roles.edit', $role->id) }}">
                <i class="fas fa-edit"></i>
              </a>
              <a class="mx-1 text-lg" role="button"
                wire:click="$emitTo('admin.partials.delete-modal-component', 'onTrashIcon' ,{{ $role->id }}, 'role')">
                <i class="fas fa-trash"></i>
              </a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
      <div>
        <p class="text-sm leading-5">
          Showing
          <span class="font-medium">{{ $roles->firstItem() }}</span>
          to
          <span class="font-medium">{{ $roles->lastItem() }}</span>
          of
          <span class="font-medium">{{ $roles->total() }}</span>
          results
        </p>
      </div>
      <div class="inline-block">
        {{ $roles->links() }}
      </div>
    </div>
  </div>
  <livewire:admin.partials.delete-modal-component />
</div>