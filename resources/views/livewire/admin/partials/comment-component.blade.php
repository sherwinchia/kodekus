<div>
  <div class="flex-1 flex justify-center p-8">
    <div class="flex flex-col w-full max-w-xl">
      <div class="card">
        <div class="card-header">
          <p>Comment</p>
          <span>{{ $article->title }}</span>
          <div class="flex flex-col justify-between">
            <span>Pending comments: {{ $article->unapproved_comments_count }}</span>
            <span>Pending replies: {{ $article->unapproved_replies_count }}</span>
          </div>
        </div>
        <div class="card-body">
          <div class="">
            <ul>
              @foreach ($comments as $comment)
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
                      <a wire:click="approve('comment', {{ $comment->id }})">
                        @if ($comment->isApproved())
                        <i class="fas fa-check text-green-400"></i>
                        @else
                        <i class="fas fa-times text-red-400"></i>
                        @endif
                      </a>
                    </div>
                    <div class="cursor-pointer">
                      <a
                        wire:click="$emitTo('admin.partials.delete-modal-component', 'onTrashIcon' ,{{ $comment->id }}, 'comment')">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </div>
                </div>
                @if ($comment->replies)
                <ul class="m-2 ml-6 mr-0 ">
                  @foreach ($comment->replies as $reply)
                  <li class="mb-2 bg-gray-200 p-4 rounded-md">
                    <div class="flex justify-between items-center">
                      <div class="font-semibold">
                        {{ $reply->name }}
                      </div>
                      <div class="font-light text-sm">
                        {{ date_to_human($reply->created_at, 'd M Y') }}
                      </div>
                    </div>
                    <div>
                      <p style=" overflow-wrap: break-word;">
                        {{ $reply->content }}
                      </p>
                    </div>
                    <div class="flex justify-end p-2 rounded space-x-2">
                      <div class="cursor-pointer">
                        <a wire:click="approve('reply', {{ $reply->id }})">
                          @if ($reply->isApproved())
                          <i class="fas fa-check text-green-400"></i>
                          @else
                          <i class="fas fa-times text-red-400"></i>
                          @endif
                        </a>
                      </div>
                      <div class="cursor-pointer">
                        <a
                          wire:click="$emitTo('admin.partials.delete-modal-component', 'onTrashIcon' ,{{ $reply->id }}, 'reply')">
                          <i class="fas fa-trash"></i>
                        </a>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                @endif
              </li>
              @endforeach
            </ul>
            <div class="flex flex-col justify-center sm:flex-row sm:items-center sm:justify-between p-2">
              <div>
                <p class="text-sm leading-5">
                  <span>Menampilkan</span>
                  <span class="font-medium">{{ $comments->firstItem() }}</span>
                  <span>sampai</span>
                  <span class="font-medium">{{ $comments->lastItem() }}</span>
                  <span>dari</span>
                  <span class="font-medium">{{ $comments->total() }}</span>
                  <span>komentar</span>
                </p>
              </div>
              <div>
                {{ $comments->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <livewire:admin.partials.delete-modal-component />
</div>