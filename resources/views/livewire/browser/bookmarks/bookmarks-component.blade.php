<div>
  @if (current_user() && !current_user()->bookmarks->isEmpty())
  <div class=" bg-gray-100 rounded-md p-4">
    <div class="flex items-center border-b border-black mb-6  py-2 ">
      <h5 class="font-semibold tracking-wider font-roboto text-xl uppercase text-black">Bookmark</h5>
    </div>
    <div class="w-full">

      @foreach ($bookmarks as $bookmark)
      <livewire:browser.bookmarks.bookmark-display :type="$type" :bookmarkable="$bookmark->bookmarkable"
        :key="$bookmark->bookmarkable->id" />
      @endforeach

    </div>
  </div>
  @endif
</div>