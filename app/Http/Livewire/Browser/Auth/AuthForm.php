<?php

namespace App\Http\Livewire\Browser\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class AuthForm extends Component
{
  public $first_name;
  public $last_name;
  public $email;
  public $password;
  public $password_confirmation;
  
  public $form;

  protected $rules = [
    'first_name' => 'required|string',
    'last_name' => 'string|nullable',
    'email' => 'required|email',
    'password' => 'required|confirmed',
  ];

  public function mount($form)
  {
    $this->changeForm($form);
  }

  public function changeForm($form)
  {
    $this->form = $form;
  }

  public function login()
  {
    $this->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

	  if (Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password])) {
      $user = current_user();

      return redirect()->intended('browser.home.index');

	  }else{
	    $this->addError('error', 'Email or password is incorrect!');
	  }
  }

  public function register()
  {
    $data = $this->validate($this->rules);

    $user = User::create([
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'role' => 'user'
    ]);

    $profile = Profile::create([
      'user_id' => $user->id,
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'slug' => generate_profile_slug()
    ]);

    Auth::guard('web')->login($user);

    return redirect()->route('browser.home.index');
  }
  
  public function render()
  {
      return view('livewire.browser.auth.auth-form');
  }
}
