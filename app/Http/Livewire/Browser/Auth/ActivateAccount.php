<?php

namespace App\Http\Livewire\Browser\Auth;

use Livewire\Component;
use App\Services\Shared\VerificationServices;
use App\Services\Browser\EmailServices;

class ActivateAccount extends Component
{
  private const TYPE_EMAIL = 'EMAIL_VERIFICATION';
  
  public $message = null;

  public function resend() {
    $user = current_user();

    $sVerification = resolve(VerificationServices::class);
    $vToken = $sVerification->generateToken($user,self::TYPE_EMAIL);

    $sEmail = resolve(EmailServices::class);
    $sEmail->activation($user, $vToken);

    $this->message = 'The new activation link has been sent successfully.';
  }

  public function logout()
  {
    return redirect()->route('browser.logout');
  }

  public function render()
  {
      return view('livewire.browser.auth.activate-account');
  }
}
