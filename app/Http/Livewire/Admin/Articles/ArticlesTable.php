<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Article;

class ArticlesTable extends Component
{
  use WithPagination;

  public $search = '';
  public $sortField = 'id';
  public $sortAsc = false;
  public $perPage = 15;

  // protected $paginationTheme = 'tailwind';

  protected $listeners = ['tableRefresh' => '$refresh'];

  public function updatingSearch()
  {
      $this->resetPage();
  }

  public function sortBy($field)
  {
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function publish($id)
  {
    $article = Article::findOrFail($id);
    $article->published = !$article->published;
    $article->save();
  }

  public function paginationView()
  {
      return 'livewire.pagination.tailwind-admin';
  }

  public function articles()
  {
    $articles = Article::query()
              ->where('title', 'LIKE', "%{$this->search}%") 
              ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
              ->paginate($this->perPage);

    return $articles;
  }

  public function render()
  {
    if (current_admin()->hasRole('admin')) {
      return view('livewire.admin.articles.articles-table', [
        'articles' => Article::query()
            ->where('title', 'LIKE', "%{$this->search}%") 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
    } else {
      return view('livewire.admin.articles.articles-table', [
        'articles' => Article::query()
            ->where('author_id','=',current_admin()->id)
            ->where('title', 'LIKE', "%{$this->search}%") 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
    }

  }
}
