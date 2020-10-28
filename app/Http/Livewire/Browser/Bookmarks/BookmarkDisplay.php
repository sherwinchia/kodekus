<?php

namespace App\Http\Livewire\Browser\Bookmarks;

use Livewire\Component;

class BookmarkDisplay extends Component
{
  public $bookmarkable;
  public $image;
  public $type;

  public function mount($bookmarkable, $image=false, $type=null)
  {
    $this->bookmarkable = $bookmarkable;
    $this->image = $image;
    $this->type = $type;
  }

  public function render()
  {
      return view('livewire.browser.bookmarks.bookmark-display');
  }
}
