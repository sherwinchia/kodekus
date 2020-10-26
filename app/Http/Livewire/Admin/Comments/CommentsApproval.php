<?php

namespace App\Http\Livewire\Admin\Comments;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Comment;
use App\Models\Reply;

class CommentsApproval extends Component
{
  use WithPagination;

  protected $listeners = [
    'refreshComponent' => '$refresh',
    'tableRefresh' => '$refresh',
  ];

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
      return view('livewire.admin.comments.comments-approval',[
        'comments' => Comment::where('approved', 0)->paginate(),
        'replies' => Reply::where('approved', 0)->paginate(),
      ]);
  }
}
