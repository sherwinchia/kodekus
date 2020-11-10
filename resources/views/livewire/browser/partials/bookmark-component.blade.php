<div class="flex items-center">
  <div class="bookmark font-light">
    <button class="p-1 px-2 outline-none" wire:click="bookmark({{ $bookmarkableId }})" wire:loading.attr="disabled"
      wire:loading.remove>
      @if (current_user() ? current_user()->bookmarked($article_model ,$bookmarkableId) : false)
      <i class=" text-black fas fa-bookmark cursor-pointer"></i>
      @else
      <i class="far fa-bookmark cursor-pointer"></i>
      @endif
    </button>
    <span wire:loading wire:target="bookmark"
      class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 mr-2"></span>
  </div>

  @if ($label)
  <span class="text-sm font-light hidden lg:block">
    {{ $label }}
  </span>
  @endif
</div>