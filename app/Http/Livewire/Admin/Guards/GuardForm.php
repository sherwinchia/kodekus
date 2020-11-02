<?php

namespace App\Http\Livewire\Admin\Guards;

use App\Models\Guard;
use Livewire\Component;

class GuardForm extends Component
{
  public $guard;

  public $name;
  public $slug;

  public $buttonText = 'Create';
  public $edit;

  protected $rules = [
    'name' => 'required|max:80',
  ];

  public function mount($guardId=null)
  { 
    $this->edit = isset($guardId) ? true : false;

    if(isset($guardId)){
      $this->guard = Guard::findOrFail($guardId);
      $this->name = $this->guard->name;
      $this->slug = $this->guard->slug;
      $this->buttonText = 'Update';
    }
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'name' => 'required|max:80',
      ]);
    } else {
      $data = $this->validate($this->rules);
    }
    

    if($this->edit){
      $this->guard->update($data);
      session()->flash('success', 'Guard successfully updated.');
      return redirect()->route('admin.guards.index');
    }else{
      Guard::create([
        'name' => $this->name,
        'slug' => $this->slug
      ]);
      session()->flash('success', 'Guard successfully created.');
      return redirect()->route('admin.guards.index');
    }
  }

  public function render()
  {
      return view('livewire.admin.guards.guard-form');
  }
}
