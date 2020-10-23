<?php

namespace App\Http\Livewire\Browser\Articles;

use Livewire\Component;

class ArticleDisplaySmall extends Component
{
  public $article;

  public function mount($article)
  {
    $this->article =$article;
  }
  
  public function render()
  {
      return view('livewire.browser.articles.article-display-small');
  }
}
