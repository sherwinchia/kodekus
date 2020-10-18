<div class="home-index container bg-white mx-auto p-4 pt-12">
  {{-- <div class="border-b-2 border-gray-300 mb-2">
    <h1>Terbaru</h1>
  </div> --}}

  <div class="flex flex-col lg:flex-row justify-center mb-4">
    <div class="w-12/12 lg:w-8/12 lg:mr-4 mb-4 lg:mb-0" style="height:24rem;">
      <div class="h-full flex flex-col justify-end rounded-sm"
        style="background-image: url({{ $latestArticles[0]->image_link }}); background-size: cover; background-position: 50%;">
        <div class=" p-4">
          <a class="" href="{{ $latestArticles[0]->article_link }}">
            <h2 class="text-white">{{ $latestArticles[0]->title }}</h2>
            <p class=" text-white mb-2">{{ $latestArticles[0]->description }}</p>
          </a>
          <div class=" flex flex-wrap">
            @foreach ($latestArticles[0]->tags as $tag)
            <a class="w-auto" href="{{ $tag->tag_link }}">
              <div class="tracking-wide py-1 px-2 rounded-sm border-2 border-white text-white text-xs mr-2 mb-2">#
                {{ $tag->name }}
              </div>
            </a>
            @endforeach
          </div>
          <div class="mb-2 flex items-center text-white text-sm">
            <span class="">{{ date_to_human($latestArticles[0]->publish_date,'d F Y') }}</span>
            <span class="px-2">|</span>
            <span class="">{{ $latestArticles[0]->read_minutes }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="w-12/12 lg:w-4/12" style="height:24rem;">
      <div class=" h-full flex flex-col justify-end rounded-sm"
        style="background-image: url({{ $latestArticles[1]->image_link }}); background-size: cover; background-position:50%;">
        <div class=" p-4">
          <a href="{{ $latestArticles[1]->article_link }}">
            <h3 class="text-white">{{ $latestArticles[1]->title }}</h3>
            <p class="block lg:hidden text-white mb-2">{{ $latestArticles[1]->description }}</p>
          </a>
          <div class=" flex flex-wrap">
            @foreach ($latestArticles[1]->tags as $tag)
            <a class="w-auto" href="{{ $tag->tag_link }}">
              <div class="tracking-wide py-1 px-2  rounded-sm border-2 border-white text-white text-xs mr-2 mb-2">#
                {{ $tag->name }}
              </div>
            </a>
            @endforeach
          </div>
          <div class="mb-2 flex items-center text-white text-sm">
            <span class="">{{ date_to_human($latestArticles[1]->publish_date,'d F Y') }}</span>
            <span class="px-2">|</span>
            <span class="">{{ $latestArticles[1]->read_minutes }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col lg:flex-row justify-center mb-4">
    <div class="w-12/12 lg:w-8/12 lg:mr-4">

      <livewire:browser.articles.articles-display-small :articles="$latestArticles">

        <div class="border-b-2 border-gray-300 mb-2">
          <h1>Featured</h1>
        </div>

    </div>

    <div class="w-12/12 lg:w-4/12 flex flex-col">

      <div class="search-form mb-8">
        <div class="input-group">
          <div class="flex items-center mb-2">
            <i class="fas fa-search mr-2"></i>
            <h5 class="font-bold text-lg uppercase text-black">Cari</h5>
          </div>
          <div class="input-group">
            <input placeholder="Contoh: Laravel , Javascript, Python" wire:keydown.enter="search" wire:model="search"
              class="text-black bg-white rounded-t hover:outline-none p-2 w-full border border-black">
          </div>
        </div>
      </div>

      <div class="mb-8">
        <div class="flex items-center mb-2">
          <i class="fas fa-layer-group mr-2"></i>
          <h5 class="font-bold text-lg uppercase text-black">Kategori</h5>
        </div>

        <div class="flex flex-wrap">
          @foreach ($categories as $category)
          <a href="{{ $category->category_link }}"
            class="w-6/12 border-l-2 p-2 border-black text-black cursor-pointer text-md hover:bg-gray-100">
            <span>{{ $category->name }}</span>
          </a>
          @endforeach
        </div>

      </div>
      <div class="mb-8">
        <div class="flex items-center mb-2">
          <i class="fas fa-hashtag mr-2"></i>
          <h5 class="font-bold text-lg uppercase text-black text-sm">Topik</h5>
        </div>

        <div class=" flex flex-wrap">
          @foreach ($tags as $tag)
          <a class="w-auto cursor-pointer mr-2" href="{{ $tag->tag_link }}">
            <div class="tracking-wide py-1 px-2 rounded-sm border-2 border-black text-black text-sm mb-2">#
              {{ $tag->name }}
            </div>
          </a>
          @endforeach
        </div>
      </div>

      <div class="mb-8 h-full">
        <div class="right-sticky">

          <div class="subscribe-form">
            <div class="flex items-center">
              <i class="far fa-newspaper mr-2"></i>
              <h5 class="font-bold text-lg uppercase text-black mr-2">Berlangganan</h5>

            </div>
            <p class="mb-2">
              Dapatkan informasi terbaru dari brand dengan berlangganan newsletter.
            </p>

            <div class="input-group mb-2">
              <label for="name">
                Nama
              </label>
              <input placeholder="John Doe"
                class="text-black bg-white rounded-t hover:outline-none p-2 w-full border border-black" />
            </div>
            <div class="input-group mb-4">
              <label for="email">
                Email
              </label>
              <input placeholder="john_doe@gmail.com"
                class="text-black bg-white rounded-t hover:outline-none p-2 w-full border border-black" />
            </div>

            <button type="button"
              class="px-4 py-2 bg-white border-black border text-black rounded w-full tracking-wide">
              Daftar
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>