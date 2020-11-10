<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Page;

class PagesTable extends Component
{
  use WithPagination;

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
      return view('livewire.admin.pages.pages-table', [
        'pages' => Page::query()
            ->where('name', 'LIKE', "%{$this->search}%") 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
  }
}
