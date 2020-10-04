<?php

namespace App\Http\Livewire\Admin\Pages;

use Hash;
use Livewire\Component;
use App\Models\User;

class ProfileForm extends Component
{
  public $user;

  public $name;
  public $email;

  public $current_password;
  public $new_password;
  public $confirm_password;

  public function mount($user)
  { 
    $this->user = User::findOrFail($user);
    $this->name = $this->user->name;
    $this->email = $this->user->email;
  }

  public function updateProfile()
  {
    $data = $this->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users,email,'.$this->user->id,
    ]);

    $this->user->update($data);

    session()->flash('success', 'Profile successfully updated.');
    return redirect()->route('admin.profile.show');
  }

  public function updatePassword()
  {
    $data = $this->validate([
      'current_password' => 'required',
      'new_password' => 'required|min:6',
      'confirm_password' => 'required',
    ]);

    if (!(Hash::check($this->current_password, $this->user->password))) {
      session()->flash('error', "Your current password does not match with the password you provided. Please try again.");
      return redirect()->route('admin.profile.show');
    }

    if (strcmp($data['new_password'], $data['confirm_password']) != 0){
      session()->flash('error', "Your new password does not match with the confirm password you provided. Please try again.");
      return redirect()->route('admin.profile.show');
    }

    $this->user->password = Hash::make($data['new_password']);
    $this->user->save();

    session()->flash('success', 'Password successfully updated.');
    return redirect()->route('admin.profile.show');
  }

  public function render()
  {
      return view('livewire.admin.pages.profile-form');
  }
}
