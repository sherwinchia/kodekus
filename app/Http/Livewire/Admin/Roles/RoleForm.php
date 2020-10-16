<?php

namespace App\Http\Livewire\Admin\Roles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Livewire\Component;

class RoleForm extends Component
{
  public $role;

  public $name;
  public $permissionsId = [];

  public $edit;
  public $defaultPermissions;

  public $buttonText = 'Create';

  protected $rules = [
    'name' => 'required|max:80',
  ];


  public function mount($roleId=null)
  { 
    $this->defaultPermissions = Permission::all();
    $this->edit = isset($roleId) ? true : false;

    if(isset($roleId)){
      $this->role = Role::findOrFail($roleId);
      $this->name = $this->role->name;
      $this->buttonText = 'Update';

      $currentPermissions = Role::findByName($this->role->name)->permissions->pluck('id')->toArray();

      foreach ($this->defaultPermissions as $key => $permission) {
        if (in_array($permission->id, $currentPermissions)) {
          $this->permissionsId[$key] = $permission->id;
        }
      }
    }
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'name' => 'required|max:80'
      ]);
    } else {
      $data = $this->validate($this->rules);
    }
    

    if($this->edit){
      $this->role->update($data);

      $permissions = [];
      foreach ($this->permissionsId as $permissionId) {
        if ($permissionId == true) {
          array_push($permissions,Permission::findOrFail($permissionId));
        }
      }
      $this->role->syncPermissions($permissions);

      session()->flash('success', 'Role successfully updated.');
      return redirect()->route('admin.roles.index');
    }else{
      $role = Role::create([
        'name' => $this->name,
      ]);

      $permissions = [];
      foreach ($this->permissionsId as $permissionId) {
        array_push($permissions,Permission::findOrFail($permissionId));
      }
      $role->syncPermissions($permissions);

      session()->flash('success', 'Role successfully created.');
      return redirect()->route('admin.roles.index');
    }
  }

  public function render()
  {
      return view('livewire.admin.roles.role-form');
  }

  public function check($array, $key, $val) 
  {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
  }
}
