<?php

namespace App\Http\Livewire\Browser\Partials;

use Livewire\Component;

class NavbarComponent extends Component
{
  public $search;

  public function search()
  {
    if ($this->search) {
      return redirect()->route('browser.search.index', ['title' => $this->search]);
    }
  }

  public function render()
  {
      return view('livewire.browser.partials.navbar-component');
  }
}
