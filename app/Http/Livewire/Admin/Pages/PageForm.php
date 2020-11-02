<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Livewire\Component;

class PageForm extends Component
{
  public $page;
  public $content;
  public $inputs = [];
  public $index;

  public function mount($pageId)
  {
    $this->page = Page::find($pageId);
    $this->content  = unserialize($this->page->content);
    dd(array_pop(array_reverse($$this->content)));
  }

  public function add($index)
  {
    $index = $index + 1;
    $this->i = $index;
    array_push($this->inputs ,$index);
  }

  public function remove($index)
  {
    unset($this->inputs[$index]);
  }

  public function render()
  {
    return view('livewire.admin.pages.page-form');
  }
}
