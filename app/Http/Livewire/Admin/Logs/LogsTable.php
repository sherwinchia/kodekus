<?php

namespace App\Http\Livewire\Admin\Logs;

use Livewire\Component;
use Livewire\WithPagination;

use Spatie\Activitylog\Models\Activity;

class LogsTable extends Component
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

  // public function delete($id)
  // {
  //   $log = Activity::findOrFail($id);
  //   $log->delete();

  //   // session()->flash('success', 'Article successfully deleted.');

  //   // return redirect()->to(route('admin.articles.index'));
  // }

  public function render()
  {
      return view('livewire.admin.logs.logs-table', [
        'logs' => Activity::query()
            ->where('log_name', 'LIKE', "%{$this->search}%") 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
  }
}
