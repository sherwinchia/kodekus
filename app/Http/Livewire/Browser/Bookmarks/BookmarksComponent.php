<?php

namespace App\Http\Livewire\Browser\Bookmarks;

use Livewire\Component;

class BookmarksComponent extends Component
{
  public $type;

  protected $listeners = [
    'bookmarkRefresh' => '$refresh',
  ];

  public function mount($type)
  {
    $this->type = $type;
  }

  public function render()
  {
      return view('livewire.browser.bookmarks.bookmarks-component',[
        'bookmarks' => current_user() ? current_user()->bookmarks : null,
      ]);
  }
}
