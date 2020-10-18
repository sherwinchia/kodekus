@php
$comments = $article->comments()->latest()->where('approved', 1)->paginate(5);
@endphp

<div class="bg-grey-300 h-full">
  <ul class="block w-full mx-auto" x-data="{drop:false}">
    <li class="flex align-center flex-col">
      <div @click="drop = !drop"
        class="flex justify-between cursor-pointer py-4 text-black inline-block border-t border-b">
        <div>
          <h5 class="font-bold text-lg uppercase text-black">Komentar {{ $comments->total() }}</h5>
        </div>
        <div>
          <i class="fas fa-caret-down fa-rotate-90" x-show="!drop"></i>
          <i class="fas fa-caret-down" x-show="drop"></i>
        </div>
      </div>
      <div x-show="drop" class="py-4 border-b" x-transition:enter="transition ease-out duration-1000"
        x-transition:enter-start="opacity-0 transform scale-100"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-100">
        <div class="flex flex-col">
          <div class="comment-display mb-4">
            <ul>
              @foreach ($comments as $comment)
              <li class="py-2">
                <div class="flex justify-between items-center">
                  <div class="font-semibold">
                    {{ $comment->user->name }}
                  </div>
                  <div class="font-light text-sm">
                    {{ date_to_human($comment->created_at, 'd M Y') }}
                  </div>
                </div>
                <div class="">
                  <p>
                    {{ $comment->content}}
                  </p>
                </div>
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
          <div class="comment-form flex flex-col">
            <div class="input-group flex space-x-2">
              <div class="w-1/2">
                <label for="name">Nama</label>
                <input wire:model="name"
                  class="text-black bg-white rounded-t hover:outline-none p-2 w-full border border-black" type="text"
                  placeholder="John Doe">
                @error('name') <span class="text-red-600 font-normal">{{ $message }}</span> @enderror
              </div>
              <div class="w-1/2">
                <label for="email">Email</label>
                <input wire:model="email"
                  class="text-black bg-white rounded-t hover:outline-none p-2 w-full border border-black" type="email"
                  placeholder="john_doe@gmail.com">
                @error('email') <span class="text-red-600 font-normal">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="input-group w-full">
              <label for="content">Isi</label>
              <textarea wire:model="content" name="content" class="w-full" rows="4"
                placeholder="Mulai ketik pesan disini..."></textarea>
              @error('content') <span class="text-red-600 font-normal">{{ $message }}</span> @enderror
            </div>
            <div>
              @if ($success_message)
              <span class="text-green-600 font-normal">{{ $success_message }}</span>
              @endif
              <button class="px-4 py-2 bg-white border-black border text-black rounded w-full tracking-wide"
                wire:click="submit" wire:loading.attr="disabled" wire:click="submit">Kirim</button>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>