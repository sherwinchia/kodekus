<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use App\Models\Profile;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
  public $user;

  public $slug;
  public $first_name;
  public $last_name;

  public $email;
  public $password;

  public $role;
  public $roles;

  public $edit;

  public $buttonText = 'Create';

  protected $rules = [
    'first_name' => 'required|max:60',
    'last_name' => 'nullable|max:60',
    'role' => 'required',
    'password' => 'required',
    'email' => 'required|email|unique:users,email',
    'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:profiles'
  ];


  public function mount($userId = null)
  {
    $this->edit = isset($userId) ? true : false;

    if (isset($userId)) {
      $this->user = User::findOrFail($userId);
      $this->email = $this->user->email;
      $this->first_name = $this->user->profile->first_name;
      $this->last_name = $this->user->profile->last_name;
      $this->slug = $this->user->profile->slug;

      $this->role = $this->user->role;
      $this->buttonText = 'Update';
    }

    $this->roles = Role::all();
  }

  public function nameAdded()
  {
    $slug = $this->first_name . ' ' . $this->last_name;
    if (isset($slug)) {
      $slug = strtolower(str_replace(' ', '-', $slug));
      $slug = preg_replace('/[^A-Za-z0-9\-]/', "", $slug);
      $this->slug = $slug;
    }
  }

  public function generatePassword()
  {
    // $this->password = substr(md5(microtime()),rand(0,26),8);
    $this->password = chr(rand() > 0.5 ? rand(65, 90) : rand(97, 122));
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'first_name' => 'required|max:80',
        'last_name' => 'nullable|max:80',
        'role' => 'required',
        'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:profiles,slug,' . $this->user->profile->id,
        'password' => 'nullable',
      ]);
    } else {
      $data = $this->validate($this->rules);
    }

    if ($data['password']) {
      $data['password'] = Hash::make($data['password']);
    } else {
      $data['password'] = $this->user->password;
    }

    $role = Role::where('name', $this->role)->first();
    $data['role'] = $role->name;

    if ($this->edit) {
      $this->user->update($data);
      $this->user->profile->update($data);
      $this->user->syncRoles($role);

      $permissions = $this->user->getPermissionsViaRoles();
      $this->user->syncPermissions($permissions);

      session()->flash('success', 'User successfully updated.');
      return redirect()->route('admin.users.index');
    } else {
      $user = User::create([
        'role' => $role->name,
        'email' => $data['email'],
        'password' => $data['password']
      ]);

      $profile = Profile::create([
        'user_id' => $user->id,
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'slug' => $data['slug']
      ]);

      $user->syncRoles($role);
      $permissions = $user->getPermissionsViaRoles();
      $user->syncPermissions($permissions);

      session()->flash('success', 'User successfully created.');
      return redirect()->route('admin.users.index');
    }
  }

  public function render()
  {
    return view('livewire.admin.users.user-form');
  }
}
