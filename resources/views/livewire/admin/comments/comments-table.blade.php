<div class="data-table">
  <div class="top">
    @if ($pending_comments || $pending_replies)
    <a href="{{ route('admin.comments.approval') }}">
      <div class="flex bg-red-500 rounded mb-2 px-2 py-4 text-white align-middle items-center space-x-2">
        <i class="fas fa-exclamation-triangle border-white px-2"></i>
        @if ($pending_comments+$pending_replies > 1)
        <span class="">There are {{ $pending_comments+$pending_replies }} of comments/replies waiting for
          approval!</span>
        @else
        <span class="">There is {{ $pending_comments+$pending_replies }} of comment/reply waiting for approval!</span>
        @endif
      </div>
    </a>
    @endif
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
            Title
          </th>
          <th class="text-left">
            Pending Comment
          </th>
          <th class="text-left">
            Pending Reply
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
            <a target="_blank" href="{{ $article->article_link }}">{{ $article->title }}</a>
          </td>
          <td class="non-id">
            {{ $article->unapproved_comments_count }}
          </td>
          <td class="non-id">
            {{ $article->unapproved_replies_count }}
          </td>
          <td class="non-id">
            <div class="flex justify-center text-gray-600">
              <a class="mx-1 text-lg" role="button" href="{{ route('admin.comments.show', $article) }}">
                <i class="far fa-eye"></i>
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