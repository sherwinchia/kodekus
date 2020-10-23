<?php

namespace App\Http\Livewire\Browser\Bookmarks;

use Livewire\Component;

class BookmarkDisplay extends Component
{
  public $bookmarkable;
  public $image;

  public function mount($bookmarkable, $image=false)
  {
    $this->bookmarkable = $bookmarkable;
    $this->image = $image;
  }

  public function render()
  {
      return view('livewire.browser.bookmarks.bookmark-display');
  }
}
