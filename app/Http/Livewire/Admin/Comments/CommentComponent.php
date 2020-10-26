<?php

namespace App\Http\Livewire\Admin\Comments;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Comment;
use App\Models\Reply;

class CommentComponent extends Component
{
  use WithPagination;

  public $article;

  protected $listeners = [
    'refreshComponent' => '$refresh',
    'tableRefresh' => '$refresh'
  ];

  public function mount($article)
  {
    $this->article = $article;
  }

  public function approve($type, $id)
  {
    switch ($type) {
      case 'comment':
        $data = Comment::find($id);
        break;
      
      case 'reply':
        $data = Reply::find($id);
        break;
      
      default:
        
        break;
    }
    $data->approved = !$data->approved;
    $data->save();
    $this->emit('refreshComponent');
  }

  public function paginationView()
  {
      return 'livewire.pagination.tailwind';
  }

  public function render()
  {
      return view('livewire.admin.comments.comment-component', [
        'comments' => $this->article->comments()->latest()->paginate(6)
      ]);
  }
}
