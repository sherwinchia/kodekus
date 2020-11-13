<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginForm extends Component
{
  protected $maxAttempts = 3;
  protected $decayMinutes = 1;

  public $email;
  public $password;

  protected $rules = [
    'email' => 'required',
    'password' => 'required',
  ];

  public function submit()
  {
    $data = $this->validate($this->rules);

	  if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])) {
      $user = auth()->guard('admin')->user();
			if ($user->hasAnyRole(['admin', 'content-writer'])) {
        return redirect()->intended(route('admin.welcome'));

      }
      Auth::guard('admin')->logout();
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
