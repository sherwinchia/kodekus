<?php

namespace App\Http\Livewire\Admin\Tags;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Tag;

class TagsTable extends Component
{
  use WithPagination;

  public $search = '';
  public $sortField = 'id';
  public $sortAsc = true;
  public $perPage = 10;

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
    $tag = Tag::findOrFail($id);
    $tag->delete();

    // session()->flash('success', 'Article successfully deleted.');

    // return redirect()->to(route('admin.articles.index'));
  }

  public function render()
  {
      return view('livewire.admin.tags.tags-table', [
        'tags' => Tag::query()
            ->where('name', 'LIKE', "%{$this->search}%") 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
  }
}
