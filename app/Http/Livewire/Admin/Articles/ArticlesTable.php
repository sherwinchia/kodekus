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
  public $sortAsc = true;
  public $perPage = 10;

  protected $listeners = [
    'delete'
  ];

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

  public function delete($id)
  {
    $article = Article::findOrFail($id);
    $article->delete();

    // session()->flash('success', 'Article successfully deleted.');

    // return redirect()->to(route('admin.articles.index'));
  }

  public function publish($id)
  {
    $article = Article::findOrFail($id);
    $article->published = !$article->published;
    $article->save();
  }

  public function paginationView()
  {
      return 'livewire.pagination.tailwind';
  }

  public function render()
  {
      return view('livewire.admin.articles.articles-table', [
        'articles' => Article::query()
            ->where('title', 'LIKE', "%{$this->search}%") 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
  }
}