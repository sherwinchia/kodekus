<?php

namespace App\Http\Livewire\Browser\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthForm extends Component
{
  public $email;
  public $password;

  public $stage;

  protected $rules = [
    'email' => 'required',
    'password' => 'required',
  ];

  public function changeStage($stage)
  {
    $this->stage = $stage;
  }

  public function submit()
  {
    $data = $this->validate($this->rules);

	  if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
      $user = current_user();

      return redirect()->intended(route('browser.home.index'));

	  }else{
	    $this->addError('error', 'Email or password is incorrect!');
	  }
  }
  
  public function render()
  {
      return view('livewire.browser.auth.auth-form');
  }
}
