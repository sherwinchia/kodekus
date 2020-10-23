<div>
  @if (current_user() && !current_user()->bookmarks->isEmpty())
  <div class=" bg-gray-200 p-4">
    <div class="flex items-center border-b border-black mb-6">
      <i class="fas fa-bookmark mr-2"></i>
      <h5 class="font-bold text-lg uppercase text-black text-sm">Bookmark</h5>
    </div>
    <div class="w-full">

      @foreach ($bookmarks as $bookmark)
      <livewire:browser.bookmarks.bookmark-display :bookmarkable="$bookmark->bookmarkable"
        :key="$bookmark->bookmarkable->id" />
      @endforeach

    </div>
  </div>
  @endif
</div>