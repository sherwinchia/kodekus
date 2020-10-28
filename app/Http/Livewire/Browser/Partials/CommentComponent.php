<?php

namespace App\Http\Livewire\Browser\Partials;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Comment;
use App\Models\Reply;

class CommentComponent extends Component
{
  use WithPagination;

  public $name;
  public $email;
  public $content;
  public $user_id;
  public $article;
  public $success_message;

  //reply
  public $comment_id;
  public $comment_name;
  public $reply_stage = false;

  public const article_model = 'App\Models\Article';

  protected $rules = [
    'name' => 'required|max:80',
    'email' => 'required|email',
    'content' => 'required|max:360',
    'user_id' => 'nullable'
  ];

  protected $messages = [
    'name.required' => 'Kolom nama tidak boleh kosong.',
    'name.max:80' => 'Kolom nama maksimal 80 karakter.',
    'email.required' => 'Kolom email tidak boleh kosong',
    'email.email' => 'Email harus valid.',
    'content.required' => 'Kolom isi tidak boleh kosong.',
    'content.max:360' => 'Kolom isi maksimal 360 karakter.',
  ];

  protected $listeners = [
    'refreshComponent' => '$refresh'  
  ];

  public function mount($article)
  {
    $this->article = $article;
    $user = current_user();
    if ($user) {
      $this->user_id = $user->id;
      $this->name = $user->full_name;
      $this->email = $user->email;
    }
  }

  public function reply($id)
  {
    $this->success_message = null;

    $comment = Comment::find($id);
    if ($comment) {
      $this->comment_id = $comment->id;
      $this->comment_name = $comment->name;
      $this->reply_stage = true;
    }

    $this->emit('scrollToCommentForm');
    
  }

  public function cancelReply()
  {
    $this->comment_id = null;
    $this->reply_stage = false;
  }

  public function submit()
  {
    $data = $this->validate($this->rules);

    $data['approved'] = false;

    if ($this->reply_stage) {
      $data['comment_id'] = $this->comment_id;
      $model = Reply::create($data);
    } else {
      $data['commentable_id'] = $this->article->id;
      $data['commentable_type'] = self::article_model;
      $model = Comment::create($data);
    }
    
    if ($model->approved == 0) {
      $this->success_message = 'Balasan anda telah sukses dikirim dan sedang menunggu peninjauan dari admin.';
    }


    $this->content = null;
    $this->comment_id = null;
    $this->reply_stage = false;
    
    $this->emit('refreshComponent');
  }

  public function paginationView()
  {
      return 'livewire.pagination.tailwind';
  }

  public function render()
  {
      return view('livewire.browser.partials.comment-component', [
        'comments' => $this->article->comments()->latest()->where('approved', 1)->paginate(5)
      ]);
  }
}
