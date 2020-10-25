<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Livewire\Component;

class UserForm extends Component
{
  public $user;

  public $first_name;
  public $last_name;

  public $role;
  public $roles;

  public $edit;

  public $buttonText = 'Create';

  protected $rules = [
    'first_name' => 'required|max:80',
    'last_name' => 'nullable|max:80',
    'role' => 'required',
  ];


  public function mount($userId=null)
  { 
    $this->edit = isset($userId) ? true : false;

    if(isset($userId)){
      $this->user = User::findOrFail($userId);
      $this->first_name = $this->user->profile->first_name;
      $this->last_name = $this->user->profile->last_name;

      $this->role = $this->user->role;
      $this->buttonText = 'Update';
    }

    $this->roles = Role::all();
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'first_name' => 'required|max:80',
        'last_name' => 'nullable|max:80',
        'role' => 'required',
      ]);
    } else {
      $data = $this->validate($this->rules);
    }
    

    if($this->edit){
      $this->user->profile->update($data);
      $this->user->syncRoles($this->role);

      session()->flash('success', 'User successfully updated.');
      return redirect()->route('admin.users.index');
    }else{
      $user = User::create([
        'name' => $this->name,
        'role' => $this->role
      ]);
      $user->syncRoles($this->role);

      session()->flash('success', 'User successfully created.');
      return redirect()->route('admin.users.index');
    }
  }

  public function render()
  {
      return view('livewire.admin.users.user-form');
  }
}
