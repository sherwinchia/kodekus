<div>
  <div class="mb-2">
    <div class="input-group search-box">
      <input wire:model.debounce.300ms="search" type="text" class="w-full"
        placeholder="Contoh: Laravel, Javascript, Python">
      {{-- <i class="fas fa-search"></i> --}}
    </div>

    <div class="input-group flex items-center justify-between mb-2 md:space-x-4">
      <div class="w-4/12 flex flex-col">
        <label for="category">Kategori</label>
        <select wire:model.debounce.300ms="category" name="category">
          <option disabled>Pilih salah satu kategori</option>
          <option value="">Semua</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="w-4/12 flex flex-col">
        <label for="tag">Topik</label>
        <select wire:model.debounce.300ms="tag" name="tag">
          <option disabled>Pilih salah satu topik</option>
          <option value="">Semua</option>
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="w-3/12 flex flex-col">
        <label for="pagination">Total</label>
        <select name="pagination" wire:model.debounce.300ms="perPage">
          <option disabled>Pilih jumlah artikel yang ditampilkan</option>
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="15">15</option>
          <option value="20">20</option>
          <option value="25">25</option>
        </select>

        {{-- <div wire:click="clear" class="cursor-pointer text-gray-700 px-2">
          <i class="fas fa-sync"></i>
        </div> --}}
      </div>

    </div>
  </div>

  <div class="flex justify-start mb-2">

    <div class="flex-1 flex flex-col">
      @foreach ($articles as $article)
      <livewire:browser.articles.article-display-small :article="$article" :key="$article->id" />
      @endforeach
    </div>

  </div>

  <div class="flex flex-col justify-center sm:flex-row sm:items-center sm:justify-between">
    <div>
      <p class="text-sm leading-5">
        <span>Menampilkan</span>
        <span class="font-medium">{{ $articles->firstItem() }}</span>
        <span>sampai</span>
        <span class="font-medium">{{ $articles->lastItem() }}</span>
        <span>dari</span>
        <span class="font-medium">{{ $articles->total() }}</span>
        <span>artikel</span>
      </p>
    </div>
    <div>
      {{ $articles->links() }}
    </div>
  </div>
</div>