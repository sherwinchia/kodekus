<?php

namespace App\Http\Livewire\Admin\Pages;

use Hash;
use Livewire\Component;
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

  public function mount($user)
  { 
    $this->user = User::findOrFail($user);
    $this->first_name = $this->user->profile->first_name;
    $this->last_name = $this->user->profile->last_name;
    $this->phone_number = $this->user->profile->phone_number;
    $this->birthdate = $this->user->profile->birthdate;
    $this->image = $this->user->profile->image;
    $this->slug = $this->user->profile->slug;
    $this->bio = $this->user->profile->bio;
    $this->facebook_link = $this->user->profile->facebook_link;
    $this->youtube_link = $this->user->profile->youtube_link;
    $this->instagram_link = $this->user->profile->instagram_link;
    $this->twitter_link = $this->user->profile->twitter_link;
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
    $data = $this->validate([
      'first_name' => 'required',
      'last_name' => 'nullable|string',
      'phone_number' => 'nullable|numeric',
      'birthdate' => 'nullable|date',
      'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:profiles,slug,'.$this->user->profile->id,
      'bio' => 'nullable|string',
      'facebook_link' => 'nullable|url',
      'twitter_link' => 'nullable|url',
      'youtube_link' => 'nullable|url',
      'instagram_link' => 'nullable|url',
      'email' => 'required|email|unique:users,email,'.$this->user->id,
      'temp_image' => 'image|max:2048|nullable',
    ]);

    if (is_object($data['temp_image'])) {
      if ($this->image) {
        //delete old Image
        Storage::delete('public/' . $this->image);
      }

      $imagePath = $this->temp_image->store('public/image/profiles');
      $data['image'] = str_replace('public/', '', $imagePath);
    }

    $this->user->update(['email' => $data['email']]);

    $this->user->profile->update($data);

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
