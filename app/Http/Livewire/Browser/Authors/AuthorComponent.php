<?php

namespace App\Http\Livewire\Browser\Authors;

use Livewire\Component;

class AuthorComponent extends Component
{
  public $author;

  public $perLoad = 6;
  public $time;
  public $operator;
  public $orderBy;
  public $sort;
  public $type;

  protected $listeners = ['author-load-more' => 'loadMore'];

  public function mount($author)
  { 
    $this->author = $author;
  }

  public function loadMore()
  {
    $this->perLoad += 6;
  }

  public function render()
  {
      return view('livewire.browser.authors.author-component', [
        'articles' => $this->author->articles()->latest('publish_date')->paginate($this->perLoad)
      ]);
  }
}