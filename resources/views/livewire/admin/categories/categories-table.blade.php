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
      <a href="{{ route('admin.categories.create') }}" role="button">Create</a>
    </div>
  </div>
  <div class="bottom">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="text-left">
            <a wire:click.prevent="sortBy('id')" role="button">ID</a>
          </th>
          <th class="text-left">
            <a wire:click.prevent="sortBy('name')" role="button">Name</a>
          </th>
          {{-- <th>
            <a wire:click.prevent="sortBy('published')" role="button">Published</a>
          </th> --}}
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($categories as $category)
        <tr>
          <td class="px-6 py-4 whitespace-no-wrap border-b">
            <div class="flex items-center">
              <div>
                <div class="text-sm leading-5 text-gray-800">{{ $category->id }}</div>
              </div>
            </div>
          </td>
          <td class="non-id">
            {{ $category->name }}
          </td>
          {{-- <td class="non-id text-center">
            {{ $category->published }}
          </td> --}}
          <td class="non-id">
            <div class="flex justify-center text-gray-600">
              <a class="mx-1 text-lg" role="button" href="{{ route('admin.categories.edit', $category->id) }}">
                <i class="fas fa-edit"></i>
              </a>
              <a class="mx-1 text-lg" role="button" wire:click.prevent="delete({{ $category->id }})">
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
          <span class="font-medium">{{ $categories->firstItem() }}</span>
          to
          <span class="font-medium">{{ $categories->lastItem() }}</span>
          of
          <span class="font-medium">{{ $categories->total() }}</span>
          results
        </p>
      </div>
      <div class="inline-block">
        {{ $categories->links() }}
      </div>
    </div>
  </div>
</div>