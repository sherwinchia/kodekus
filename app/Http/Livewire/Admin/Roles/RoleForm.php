<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Guard;
use Livewire\Component;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleForm extends Component
{
  public $role;

  public $name;
  public $guard_name;
  public $permissionsId = [];

  public $edit;
  public $defaultPermissions;
  public $guards;

  public $buttonText = 'Create';

  protected $rules = [
    'name' => 'required|max:80',
    'guard_name' => 'required'
  ];


  public function mount($roleId=null)
  { 
    $this->guards = Guard::all();
    $this->edit = isset($roleId) ? true : false;

    if(isset($roleId)){
      $this->role = Role::findOrFail($roleId);
      $this->name = $this->role->name;
      $this->guard_name = $this->role->guard_name;
      $this->buttonText = 'Update';
      $this->defaultPermissions = Permission::where('guard_name', $this->guard_name)->get();

      $currentPermissions = Role::findByName($this->role->name, $this->guard_name)->permissions->pluck('id')->toArray();

      foreach ($this->defaultPermissions as $key => $permission) {
        if (in_array($permission->id, $currentPermissions)) {
          $this->permissionsId[$key] = $permission->id;
        }
      }
    }
  }

  public function guardChange()
  {
    $this->defaultPermissions = Permission::where('guard_name', $this->guard_name)->get();
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'name' => 'required|max:80',
        'guard_name' => 'required'
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
        'guard_name' => $this->guard_name,
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
