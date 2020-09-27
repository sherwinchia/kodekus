<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LoginForm extends Component
{

  public $email;
  public $password;

  protected $rules = [
    'email' => 'required',
    'password' => 'required',
  ];

  public function submit()
  {
    $data = $this->validate($this->rules);

	  if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
      $admin = current_user();
			if ($admin->isAdmin()) {
        return redirect()->intended(route('admin.welcome'));
			}
      Auth::logout();
      $this->addError('error', 'Email or password is incorrect!');
			
	  }else{
	    $this->addError('error', 'Email or password is incorrect!');
	  }
  }

  public function render()
  {
      return view('livewire.admin.pages.login-form');
  }
}
