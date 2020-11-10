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

  public $pending_comments;
  public $pending_replies;

  protected $listeners = ['tableRefresh' => '$refresh'];

  public function mount()
  {
    $articles = Article::all();
    foreach ($articles as $article) {
      $this->pending_comments += $article->unapproved_comments_count;
      $this->pending_replies += $article->unapproved_replies_count;
    }
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

  public function paginationView()
  {
      return 'livewire.pagination.tailwind-admin';
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
            ->paginate($this->perPage),
        'pending_comments'  => $this->pending_comments,
        'pending_replies'  => $this->pending_replies,
      ]);
  }
}
