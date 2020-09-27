<?php

namespace App\Http\Livewire\Admin\Roles;

use Spatie\Permission\Models\Role;

use Livewire\Component;
use Livewire\WithPagination;

class RolesTable extends Component
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
    $category = Role::findOrFail($id);
    $category->delete();

    // session()->flash('success', 'Article successfully deleted.');

    // return redirect()->to(route('admin.articles.index'));
  }

  public function render()
  {
      return view('livewire.admin.roles.roles-table',[
        'roles' => Role::query()
            ->where('name', 'LIKE', "%{$this->search}%") 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
  }
}
