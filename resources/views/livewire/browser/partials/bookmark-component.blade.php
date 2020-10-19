<div class="flex items-center">
  <div class="bookmark text-lg">
    <button class="p-1 px-2 outline-none" wire:click="bookmark({{ $bookmarkableId }})" wire:loading.attr="disabled">
      @if (current_user() ? current_user()->bookmarked($article_model ,$bookmarkableId) : false)
      <i class="fas fa-bookmark cursor-pointer"></i>
      @else
      <i class="far fa-bookmark cursor-pointer"></i>
      @endif
    </button>
  </div>

  @if ($label)
  <span class="text-sm font-light">
    {{ $label }}
  </span>
  @endif
</div>