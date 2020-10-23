<?php

namespace App\Http\Livewire\Browser\Home;

use Livewire\Component;

use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;

class HomeComponent extends Component
{
  public $tags;
  public $categories;
  public $search;
  public $loadMore = 10;

  protected $listeners = ['loadMore'];

  public function mount()
  {
    $this->tags = Tag::all()->filter(function ($tags){
      return $tags->articles->count() > 0;
    });;

    $this->categories = Category::all()->filter(function ($category){
      return $category->articles->count() > 0;
    });
  }

  public function search()
  {
    return redirect(route('browser.search.index',['title' => $this->search]));
  }

  public function render()
  {
      return view('livewire.browser.home.home-component', [
        'latestArticles' => Article::latest('publish_date')->take($this->loadMore)->get()
      ]);
  }
}
