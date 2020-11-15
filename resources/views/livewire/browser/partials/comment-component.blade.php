<div class=" h-full" x-data="{drop:false}">
  <ul class="block w-full mx-auto">
    <li class="flex align-center flex-col">
      <div @click="drop = !drop"
        class="flex justify-between cursor-pointer py-4 text-black border-t border-b border-black">
        <div>
          <h3 class="font-normal text-lg text-black">
            @if ($article->total_comments>1)
            Comments ({{ $article->total_comments }})
            @else
            Comment ({{ $article->total_comments }})
            @endif
          </h3>
        </div>
        <div>
          <i class="fas fa-caret-down fa-rotate-90" x-show="!drop"></i>
          <i class="fas fa-caret-down" x-show="drop"></i>
        </div>
      </div>
      <div x-show.transition.origin.top="drop" class="py-4 ">
        <div class="flex flex-col">
          <div class="comment-display">
            <ul>
              @foreach ($comments as $comment)
              {{-- {{ dd($comment->replies) }} --}}
              <li class="my-4 border-b border-gray-200">
                <div class="flex flex-col  pb-4">
                  <div class="flex align-middle items-center">
                    <div class="flex align-middle items-center rounded-full bg-red-500 w-16 h-16" style="background-image: url({{ $comment->user ? $comment->user->profile->image_link : asset('images/placeholder/no-profile.png') }}); background-size: cover; background-position:
                      50%;">
                    </div>
                    <div class="flex flex-col ml-4">
                      @if ($comment->user)
                      <span class="text-black font-normal">{{ $comment->name }}</span>
                      @else
                      <span class="text-black font-normal">{{ $comment->name }} (guest)</span>
                      @endif
                      <span class="text-gray-800 font-light text-sm ">
                        {{ date_to_human($comment->created_at, 'd M Y H:i') }}
                      </span>
                      <a class="cursor-pointer underline text-sm" wire:click="reply({{ $comment->id }})">Reply</a>
                    </div>
                  </div>

                  <div>
                    <p class="ml-16 pl-4 mt-2" style=" overflow-wrap: break-word;">{{ $comment->content}}</p>
                  </div>
                </div>

                @if ($comment->replies)
                <ul class="m-2 ml-10 mr-0">
                  @foreach ($comment->replies()->latest()->where('approved', 1)->get() as $reply)
                  <li class="my-4">
                    <div class="flex flex-col pb-4">
                      <div class="flex align-middle items-center">
                        <div class="flex align-middle items-center rounded-full bg-red-500 w-16 h-16" style="background-image: url({{ $reply->user ? $reply->user->profile->image_link : asset('images/placeholder/no-profile.png') }}); background-size: cover; background-position:
                          50%;">
                        </div>
                        <div class="flex flex-col ml-4">
                          @if ($reply->user)
                          <span class="text-black font-normal">{{ $reply->name }}</span>
                          @else
                          <span class="text-black font-normal">{{ $reply->name }} (guest)</span>
                          @endif
                          <span class="text-gray-800 font-light text-sm ">
                            {{ date_to_human($reply->created_at, 'd M Y H:i') }}
                          </span>
                        </div>
                      </div>
                      <div>
                        <p class="ml-16 pl-4" style=" overflow-wrap: break-word;">{{ $reply->content}}</p>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                @endif
              </li>
              @endforeach
            </ul>
            @if (!$comments->isEmpty())
            <div class="flex flex-col justify-center sm:flex-row sm:items-center sm:justify-between">
              {{-- <div>
                <p class="text-sm leading-5">
                  <span>Menampilkan</span>
                  <span class="font-medium">{{ $comments->firstItem() }}</span>
              <span>sampai</span>
              <span class="font-medium">{{ $comments->lastItem() }}</span>
              <span>dari</span>
              <span class="font-medium">{{ $comments->total() }}</span>
              <span>komentar</span>
              </p>
            </div> --}}
            <div>
              {{ $comments->links() }}
            </div>
          </div>
          @endif
        </div>
        <div id="comment-form" class="comment-form flex flex-col p-4 border border-black rounded mt-4">
          <h5 class=" text-lg uppercase text-black mb-2">Tulis balasan</h5>
          @if ($reply_stage == true)
          <div>
            <span>Replying to </span>
            <span class="font-semibold">{{ $comment_name }}</span>
            <a class="cursor-pointer underline" wire:click="cancelReply">Cancel</a>
          </div>
          @endif
          @if (!Auth::check())
          <div class="input-group flex space-x-4">
            <div class="w-1/2">
              <label for="name">Nama</label>
              <input wire:model.debounce="name" class="text-black bg-white  p-2 w-full border border-black" type="text"
                placeholder="John Doe">
              @error('name') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
            <div class="w-1/2">
              <label for="email">Email</label>
              <input wire:model.debounce="email" class="text-black bg-white  p-2 w-full border border-black"
                type="email" placeholder="john_doe@gmail.com">
              @error('email') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </div>
          @endif
          <div class="input-group w-full">
            <label for="content">Isi</label>
            <textarea wire:model.debounce="content" name="content" class="w-full" rows="4"
              placeholder="Mulai ketik pesan disini..."></textarea>
            @error('content') <span class="error-msg">{{ $message }}</span> @enderror
          </div>
          <div>

            @if ($success_message)
            <span class="text-green-600 font-normal mb-2">{{ $success_message }}</span>
            @endif
            <div class="flex justify-end">
              <button id="comment-btn"
                class="flex justify-center items-center px-4 py-2 bg-white border-black border text-black rounded tracking-wide"
                wire:loading.attr="disabled" wire:click="submit">Kirim
                <span wire:loading wire:target="submit"
                  class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 ml-2"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
</div>
</li>
</ul>
</div>

@section('scripts')

<script type="text/javascript">
  window.livewire.on('scrollToCommentForm', event => {
    document.getElementById('comment-form').scrollIntoView({behavior: 'smooth'});
  })
</script>

@endsection