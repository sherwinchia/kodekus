<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\Article;

class Edit extends Component
{
  public $article;

  public function mount(Article $article)
  {
    $this->article = $article;
  }

  public function render()
  {
      return view('livewire.admin.articles.edit');
  }
}
