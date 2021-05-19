<?php

namespace App\Http\Livewire\Admin\Partials;

use App\Models\Tag;
use App\Models\User;
use App\Models\Guard;
use App\Models\Reply;
use App\Models\Series;
use App\Models\Article;
use App\Models\Comment;
use Livewire\Component;
use App\Models\Category;
use App\models\Quiz;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;

class DeleteModalComponent extends Component
{
  public $type;

  protected $listeners = [
    'delete',
    'onTrashIcon'
  ];

  public function onTrashIcon($id, $type)
  {
    $this->type = $type;
    $this->emit('triggerConfirmationModal', $id);
  }

  public function delete($id)
  {
    switch ($this->type) {
      case 'article':
        $article = Article::find($id);
        $article->bookmarks()->delete();
        $article->delete();
        break;

      case 'category':
        $category = Category::find($id);

        if ($category->articles->isEmpty()) {
          $category->delete();
        } else {
          session()->flash('error', 'Failed to delete category!');
          return redirect()->route('admin.categories.index');
        }

        break;

      case 'tag':
        $tag = Tag::find($id);

        if ($tag->articles->isEmpty()) {
          $tag->delete();
        } else {
          session()->flash('error', 'Failed to delete tag!');
          return redirect()->route('admin.tags.index');
        }

        break;

      case 'series':
        $series = Series::find($id);

        if ($series->articles->isEmpty()) {
          $series->delete();
        } else {
          session()->flash('error', 'Failed to delete series!');
          return redirect()->route('admin.series.index');
        }

        break;

      case 'role':
        $users = User::all();
        $role = Role::find($id);

        foreach ($users as $user) {
          if ($user->role == $role->name) {
            session()->flash('error', 'Failed to delete role!');
            return redirect()->route('admin.roles.index');
          }
        }

        $role->delete();
        break;

      case 'permission':
        $permission = Permission::find($id);
        $permission->delete();
        break;

      case 'comment':
        $comment = Comment::find($id);
        $comment->replies()->delete();
        $comment->delete();
        break;

      case 'reply':
        $reply = Reply::find($id);
        $reply->delete();
        break;

      case 'guard':
        $reply = Guard::find($id);
        $reply->delete();
        break;

      case 'activity':
        $activities = Activity::truncate();
        $activities->delete();
        break;

      case 'user':
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        break;

      case 'quiz':
        $quiz = Quiz::find($id);
        $questions = $quiz->questions;
        foreach ($questions as $question) {
          $question->options()->delete();
        }
        $quiz->questions()->delete();
        $quiz->delete();
        break;
      default:
        # code...
        break;
    }

    $this->emitUp('tableRefresh');
  }

  public function render()
  {
    return view('livewire.admin.partials.delete-modal-component');
  }
}
