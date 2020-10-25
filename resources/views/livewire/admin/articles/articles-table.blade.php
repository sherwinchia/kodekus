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
      <a href="{{ route('admin.articles.create') }}" role="button">Create</a>
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
            <a wire:click.prevent="sortBy('title')" role="button">Title</a>
            @include('admin.layouts.partials.sort-icon', ['field'=>'title'])
          </th>
          <th>
            <a wire:click.prevent="sortBy('publish_date')" role="button">Publish Date</a>
            @include('admin.layouts.partials.sort-icon', ['field'=>'publish_date'])
          </th>
          <th>
            <a wire:click.prevent="sortBy('published')" role="button">Published</a>
            @include('admin.layouts.partials.sort-icon', ['field'=>'published'])
          </th>
          <th>
            Action
          </th>


        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($articles as $article)
        <tr>
          <td class="px-6 py-4 whitespace-no-wrap border-b">
            <div class="flex items-center">
              <div>
                <div class="text-sm leading-5 text-gray-800">{{ $article->id }}</div>
              </div>
            </div>
          </td>
          <td class="non-id">
            {{ $article->title }}
          </td>
          <td>
            {{ date_to_human($article->publish_date) }}
          </td>
          <td class="non-id text-center">
            @if ($article->published)
            <input type="checkbox" wire:click.prevent="publish({{ $article->id }})" checked>
            @else
            <input type="checkbox" wire:click.prevent="publish({{ $article->id }})">
            @endif
          </td>
          <td class=" non-id">
            <div class="flex justify-center text-gray-600">
              <a class="mx-1 text-lg" role="button" href="{{ route('admin.articles.edit', $article->id) }}">
                <i class="fas fa-edit"></i>
              </a>
              <a class="mx-1 text-lg" role="button"
                wire:click="$emitTo('admin.partials.delete-modal-component', 'onTrashIcon' ,{{ $article->id }}, 'article')">
                <i class=" fas fa-trash"></i>
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
          <span class="font-medium">{{ $articles->firstItem() }}</span>
          to
          <span class="font-medium">{{ $articles->lastItem() }}</span>
          of
          <span class="font-medium">{{ $articles->total() }}</span>
          results
        </p>
      </div>
      <div class="inline-block">
        {{ $articles->links() }}
      </div>
    </div>
  </div>

  <livewire:admin.partials.delete-modal-component />
</div>