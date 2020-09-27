<?php

namespace App\Http\Livewire\Admin\Permissions;

use Spatie\Permission\Models\Permission;

use Livewire\Component;

class PermissionForm extends Component
{
  public $permission;

  public $name;

  public $edit;

  public $buttonText = 'Create';

  protected $rules = [
    'name' => 'required|max:80',
  ];


  public function mount($permissionId=null)
  { 
    $this->edit = isset($permissionId) ? true : false;

    if(isset($permissionId)){
      $this->permission = Permission::findOrFail($permissionId);
      $this->name = $this->permission->name;
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
      $this->permission->update($data);
      session()->flash('success', 'permission successfully updated.');
      return redirect()->route('admin.permissions.index');
    }else{
      Permission::create([
        'name' => $this->name,
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
