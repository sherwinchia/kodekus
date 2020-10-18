<div class="bookmark">
  <button class="p-1 px-2 outline-none clic" wire:click="bookmark({{ $bookmarkableId }})" wire:loading.attr="disabled">
    @if (current_user()->bookmarked($article_model ,$bookmarkableId))
    <i class="fas fa-bookmark cursor-pointer"></i>
    @else
    <i class="far fa-bookmark cursor-pointer"></i>
    @endif
  </button>
</div>