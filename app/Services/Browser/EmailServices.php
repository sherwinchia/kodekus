<?php

namespace App\Services\Browser;

use Mail;
use App\Models\User;
use App\Models\VerificationToken;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\ActivationMail;
use App\Mail\ForgotPasswordMail;

class EmailServices
{
  public function activation(User $user, VerificationToken $vToken)
  {
    Mail::to($user->email)->send(new ActivationMail($user, $vToken));
  }

  public function forgotPassword(User $user, VerificationToken $vToken)
  {
    Mail::to($user->email)->send(new ForgotPasswordMail($user, $vToken));
  }
}
