<?php

namespace App\Http\Livewire\Admin\Comments;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Comment;
use App\Models\Article;

class CommentsTable extends Component
{
  use WithPagination;

  public $search = '';
  public $sortField = 'id';
  public $sortAsc = true;
  public $perPage = 10;

  protected $listeners = ['tableRefresh' => '$refresh'];

  public function sortBy($field)
  {
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function paginationView()
  {
      return 'livewire.pagination.tailwind';
  }

  public function render()
  {
      // return view('livewire.admin.comments.comments-table', [
      //   'comments' => Comment::query()
      //       ->where('approved', 1)
      //       ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
      //       ->paginate($this->perPage)
      // ]);
      return view('livewire.admin.comments.comments-table', [
        'articles' => Article::query()
            ->where('published', 1)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
  }
}
