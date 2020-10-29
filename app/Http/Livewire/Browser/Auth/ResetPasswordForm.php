<?php

namespace App\Http\Livewire\Browser\Auth;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\VerificationToken;
use App\Services\Shared\VerificationServices;

class ResetPasswordForm extends Component
{
  private const TYPE_PASSWORD = 'PASSWORD_RESET';
  
  public $token;

  public $password;
  public $password_confirmation;

  public $stage = 'reset-form';

  protected $rules = [
    'password' => 'required|confirmed|min:6'
  ];

  public function mount($token)
  {
    $this->token = $token;
  }

  public function changeStage($stage)
  {
    $this->stage = $stage;
  }
  
  public function resetPassword()
  {
    $this->validate($this->rules);

    $sVerification = resolve(VerificationServices::class);

    $sVerification->isValidToken($this->token, self::TYPE_PASSWORD);

    $sVerification->revokeToken($this->token);
    
    $user = $this->token->user;
		$user->password = Hash::make($this->password);
		$user->save();

    $this->changeStage('reset-success');
  }

  public function login()
  {
    Auth::guard('web')->login($this->token->user);
    
    return redirect()->route('browser.home.index');
  }

  public function render()
  {
      return view('livewire.browser.auth.reset-password-form');
  }
    
}
