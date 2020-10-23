<?php

namespace App\Http\Livewire\Browser\Bookmarks;

use Livewire\Component;

class BookmarksComponent extends Component
{
  protected $listeners = [
    'bookmarkRefresh' => '$refresh',
  ];

  public function render()
  {
      return view('livewire.browser.bookmarks.bookmarks-component',[
        'bookmarks' => current_user() ? current_user()->bookmarks : null,
      ]);
  }
}
