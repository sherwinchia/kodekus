<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Guard;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionForm extends Component
{
  public $permission;

  public $name;
  public $guard_name;
  public $guards;
  public $edit;

  public $buttonText = 'Create';

  protected $rules = [
    'name' => 'required|max:80',
    'guard_name' => 'required|string',
  ];


  public function mount($permissionId=null)
  { 
    $this->edit = isset($permissionId) ? true : false;
    $this->guards = Guard::all();
    
    if(isset($permissionId)){
      $this->permission = Permission::findOrFail($permissionId);
      $this->name = $this->permission->name;
      $this->guard_name = $this->permission->guard_name;
      $this->buttonText = 'Update';
    }
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'name' => 'required|max:80',
        'guard_name' => 'required|string',
      ]);
    } else {
      $data = $this->validate($this->rules);
    }
    

    if($this->edit){
      $this->permission->update($data);
      session()->flash('success', 'permission successfully updated.');
      return redirect()->route('admin.permissions.index');
    }else{
      Permission::create([
        'name' => $this->name,
        'guard_name' => $this->guard_name
      ]);
      session()->flash('success', 'permission successfully created.');
      return redirect()->route('admin.permissions.index');
    }
  }

  public function render()
  {
      return view('livewire.admin.permissions.permission-form');
  }
}
