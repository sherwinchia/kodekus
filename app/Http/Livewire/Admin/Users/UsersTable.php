<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;

class UsersTable extends Component
{
  use WithPagination;

  protected $listeners = ['tableRefresh' => '$refresh'];

  public $search = '';
  public $sortField = 'id';
  public $sortAsc = true;
  public $perPage = 10;

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

  public function paginationView()
  {
      return 'livewire.pagination.tailwind-admin';
  }

  public function render()
  {
      return view('livewire.admin.users.users-table', [
        'users' => User::query()
            ->whereHas('profile', function($query){
              $query->where('first_name', 'LIKE', "%{$this->search}%");
            }) 
            ->orWhereHas('profile', function($query){
              $query->where('last_name', 'LIKE', "%{$this->search}%");
            }) 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
  }
}
