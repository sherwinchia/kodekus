<div>
  <div class="flex-1 flex justify-center p-8">
    <div class="flex flex-col w-full max-w-xl">
      @if (!$comments->isEmpty() || !$replies->isEmpty())
      @if (!$comments->isEmpty())
      <div class="card">
        <div class="card-header">
          <p>Pending Comments <span>({{ $comments->count() }})</span></p>
        </div>
        <div class="card-body">
          <ul>
            @foreach ($comments as $comment)
            <a href="{{ route('admin.comments.show', $comment->commentable->id ) }}">
              <li class="py-2">
                <div class="bg-gray-200 p-4 rounded-md">
                  <div class="flex justify-between items-center">
                    <div class="font-semibold">
                      {{ $comment->name }}
                    </div>
                    <div class="font-light text-sm">
                      {{ date_to_human($comment->created_at, 'd M Y') }}
                    </div>
                  </div>
                  <div class="mb-2">
                    <p style=" overflow-wrap: break-word;">
                      {{ $comment->content}}
                    </p>
                  </div>
                  <div class="flex justify-end p-2 rounded space-x-2">
                    <div class="cursor-pointer">
                      <a class="p-2 bg-green-500 text-white rounded" wire:loading.attr="disabled"
                        wire:click="approve('comment', {{ $comment->id }})">
                        Approve
                      </a>
                    </div>
                    <div class="cursor-pointer">
                      <a class="p-2 bg-red-500 rounded text-white" wire:loading.attr="disabled"
                        wire:click="$emitTo('admin.partials.delete-modal-component', 'onTrashIcon' ,{{ $comment->id }}, 'comment')">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
            </a>
            @endforeach
          </ul>
          <div class="flex flex-col justify-center sm:flex-row sm:items-center sm:justify-between p-2">
            <div>
              <p class="text-sm leading-5">
                <span>Showing</span>
                <span class="font-medium">{{ $comments->firstItem() }}</span>
                <span>to</span>
                <span class="font-medium">{{ $comments->lastItem() }}</span>
                <span>from</span>
                <span class="font-medium">{{ $comments->total() }}</span>
                <span>comment</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      @endif
      @if (!$replies->isEmpty())
      <div class="card">
        <div class="card-header">
          <p>Pending Replies <span>({{ $replies->count() }})</span></p>
        </div>
        <div class="card-body">
          <ul>
            @foreach ($replies as $reply)
            <a href="{{ route('admin.comments.show', $reply->comment->commentable->id ) }}">
              <li class="py-2">
                <div class="bg-gray-200 p-4 rounded-md">
                  <div class="flex justify-between items-center">
                    <div class="font-semibold">
                      {{ $reply->name }}
                    </div>
                    <div class="font-light text-sm">
                      {{ date_to_human($reply->created_at, 'd M Y') }}
                    </div>
                  </div>
                  <div class="mb-2">
                    <p style=" overflow-wrap: break-word;">
                      {{ $reply->content}}
                    </p>
                  </div>
                  <div class="flex justify-end p-2 rounded space-x-2">
                    <div class="cursor-pointer">
                      <a class="p-2 bg-green-500 text-white rounded" wire:loading.attr="disabled"
                        wire:click="approve('reply', {{ $reply->id }})">
                        Approve
                      </a>
                    </div>
                    <div class="cursor-pointer">
                      <a class="p-2 bg-red-500 rounded text-white" wire:loading.attr="disabled"
                        wire:click="$emitTo('admin.partials.delete-modal-component', 'onTrashIcon' ,{{ $reply->id }}, 'reply')">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
            </a>
            @endforeach
          </ul>
          <div class="flex flex-col justify-center sm:flex-row sm:items-center sm:justify-between p-2">
            <div>
              <p class="text-sm leading-5">
                <span>Showing</span>
                <span class="font-medium">{{ $replies->firstItem() }}</span>
                <span>to</span>
                <span class="font-medium">{{ $replies->lastItem() }}</span>
                <span>from</span>
                <span class="font-medium">{{ $replies->total() }}</span>
                <span>replies</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      @endif
      @else
      <div class="flex flex-col items-center align-middle justify-center">
        <h3>All good 👌</h3> <a href="{{ route('admin.comments.index') }}">Back to table</a>
      </div>
      @endif


    </div>
  </div>
  <livewire:admin.partials.delete-modal-component />
</div>