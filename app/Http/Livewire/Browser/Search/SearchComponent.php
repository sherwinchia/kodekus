<?php

namespace App\Http\Livewire\Browser\Search;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class SearchComponent extends Component
{
  use WithPagination;

  public $search = '';
  public $sortField = 'id';
  public $sortAsc = true;
  public $perPage = 10;
  public $category = '';
  public $tag = '';
  
  public $categories;
  public $tags;

  public function mount()
  {
    if (request()->has('category')) {
      $this->category = request()->get('category');
    }

    if (request()->has('tag')) {
      $this->tag = request()->get('tag');
    }

    if (request()->has('title')) {
      $this->search = request()->get('title');
    }
    
    $this->tags = Tag::all()->filter(function ($tags){
      return $tags->articles->count() > 0;
    });;

    $this->categories = Category::all()->filter(function ($category){
      return $category->articles->count() > 0;
    });
  }

  public function updatingSearch()
  {
      $this->resetPage();
  }

  public function clear()
  {
    $this->search = '';
    $this->category = '';
    $this->tag = '';
    $this->perPage = 10;
  }

  public function update()
  {
    $articles = Article::where('publish_date','<=',now())->where('published',1);

    if ($this->search !== '') {
      $articles = $articles->where('title', 'LIKE', "%{$this->search}%");
    }

    if ($this->category !== '') {
      $articles = $articles->where('category_id', $this->category);
    }

    if ($this->tag !== '') {
      $articles = $articles->whereHas('tags', function($query){
        $query->where('tags.id', $this->tag);
      });
    }

    return $articles->paginate($this->perPage);
  }

  public function paginationView()
  {
      return 'livewire.pagination.tailwind';
  }


  public function render()
  {
      return view('livewire.browser.search.search-component', [
        'articles' => $this->update(),
      ]);
  }
}
