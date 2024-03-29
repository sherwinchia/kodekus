<?php

namespace App\Http\Livewire\Browser\Profiles;

use Livewire\Component;
use Hash;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProfileForm extends Component
{
  use WithFileUploads;

  public $user;

  public $first_name;
  public $last_name;
  public $email;
  public $birthdate;
  public $slug;
  public $bio;
  public $facebook_link;
  public $youtube_link;
  public $instagram_link;
  public $twitter_link;
  public $phone_number;
  public $temp_image;
  public $image;

  public $current_password;
  public $new_password;
  public $confirm_password;

  public $profile_msg;
  public $password_msg;

  public function mount($user)
  { 
    $this->user = User::findOrFail($user);
    $this->first_name = $this->user->profile->first_name;
    $this->last_name = $this->user->profile->last_name;
    $this->phone_number = $this->user->profile->phone_number;
    $this->birthdate = $this->user->profile->birthdate;
    $this->image = $this->user->profile->image;
    $this->email = $this->user->email;
  }

  public function nameAdded()
  {
    $slug = $this->first_name .' '. $this->last_name;
    if(isset($slug)){
      $slug = strtolower(str_replace(' ','-',$slug));
      $slug = preg_replace('/[^A-Za-z0-9\-]/', "",$slug);
      $this->slug = $slug;
    } 
  }

  public function updateProfile()
  {
    $this->profile_msg = null;

    $data = $this->validate([
      'first_name' => 'required',
      'last_name' => 'nullable|string',
      'phone_number' => 'nullable|numeric',
      'birthdate' => 'nullable|date',
      'temp_image' => 'image|max:4096|nullable',
    ]);

    if (is_object($data['temp_image'])) {
      if ($this->image) {
        //delete old Image
        Storage::delete('public/' . $this->image);
      }

      $imagePath = $this->temp_image->store('public/image/profiles');
      $data['image'] = str_replace('public/', '', $imagePath);
    }

    $this->user->profile->update($data);
    $this->profile_msg = 'Profile successfully updated';
  }

  public function updatePassword()
  {
    $this->password_msg = null;

    $data = $this->validate([
      'current_password' => 'required',
      'new_password' => 'required|min:6',
      'confirm_password' => 'required',
    ]);

    if (!(Hash::check($this->current_password, $this->user->password))) {
      return $this->addError('confirm_password', 'Your current password does not match with the password you provided. Please try again.');
    }

    if (strcmp($data['new_password'], $data['confirm_password']) != 0){
      return $this->addError('confirm_password', 'Your new password does not match with the confirm password you provided. Please try again.');
    }

    $this->user->password = Hash::make($data['new_password']);
    $this->user->save();

    $this->current_password = null;
    $this->new_password = null ;
    $this->confirm_password = null;
    $this->password_msg = 'Password successfully updated';

  }

  public function render()
  {
      return view('livewire.browser.profiles.profile-form');
  }
}
