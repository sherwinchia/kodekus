<?php

namespace App\Http\Livewire\Browser\Partials;

use App\Models\Like;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class LikeComponent extends Component
{
  public $article_model = 'App\Models\Article';

  public $likeable;
  public $likeableId;

  public $counter;
  public $label;

  protected $listeners = [
    'likeRefresh' => '$refresh',
  ];

  public function mount($likeableId, $counter = false, $label = null)
  {
    $this->likeableId = $likeableId;
    $this->likeable = Article::find($likeableId);
    $this->counter = $counter;
    $this->label = $label;
  }

  public function like($id)
  {
    $user = current_user();
    if ($user) {
      if ($user->liked($this->article_model ,$id)) {
        $liked = $user->likes->where('likeable_type', $this->article_model)
                              ->where('likeable_id',$id)
                              ->first();
        $liked->delete();
      } else {
        $article = Article::find($id);
        if ($user && $article) {
          $like  = Like::create([
            'user_id' => $user->id,
            'likeable_id' => $article->id,
            'likeable_type' => $this->article_model,
          ]);
        }
      }
      $this->emit('likeRefresh');
    } else {
      Session::put('url.intended',url()->previous());
      return redirect()->route('browser.auth.show',['type'=> 'login']);
    }
  }

  public function render()
  {
      return view('livewire.browser.partials.like-component');
  }
}
