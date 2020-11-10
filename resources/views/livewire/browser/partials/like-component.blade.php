<div class="flex items-center">
  <div class="like flex flex-col justify-center text-lg">
    @if ($counter)
    <button class="p-1 px-2 outline-none" wire:click="like({{ $likeableId }})" wire:loading.remove
      wire:loading.attr="disabled">
      @if (current_user() ? current_user()->liked($article_model ,$likeableId) : false)
      <i class=" text-red-400 fas fa-heart cursor-pointer"></i>
      @else
      <i class="far fa-heart cursor-pointer"></i>
      @endif
    </button>
    <span wire:loading wire:target="like"
      class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 mr-2"></span>
    <span class="text-xs text-center">{{ $likeable->likes->count() }}</span>
    @else
    <button class="p-1 px-2 outline-none" wire:click="like({{ $likeableId }})" wire:loading.remove
      wire:loading.attr="disabled">
      @if (current_user() ? current_user()->liked($article_model ,$likeableId) : false)
      <i class=" text-red-400 fas fa-heart cursor-pointer"></i>
      @else
      <i class="far fa-heart cursor-pointer"></i>
      @endif
    </button>
    <span wire:loading wire:target="like"
      class="animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-gray-900 mr-2"></span>
    @endif
  </div>

  @if ($label)
  <span class="text-sm font-light hidden lg:block">
    {{ $label }}
  </span>
  @endif
</div>