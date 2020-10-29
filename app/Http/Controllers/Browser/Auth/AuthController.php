<?php

namespace App\Http\Controllers\Browser\Auth;

use App\Models\VerificationToken;
use App\Services\Shared\VerificationServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public const PATH = 'browser.auth.';
  private const TYPE_EMAIL = 'EMAIL_VERIFICATION';
  private const TYPE_PASSWORD = 'PASSWORD_RESET';

  protected $sVerification;

  public function __construct()
  {
    $this->sVerification = resolve(VerificationServices::class);
  }

  public function show()
  {
    if (request()->has('type')) {
      $form  = request()->get('type');
    } else {
      $form = 'login';
    }
    
    return view(self::PATH . 'show', compact('form'));
  }

  public function logout()
  {
    Auth::guard('web')->logout();
	  return redirect()->route('browser.home.index');
  }
  
  public function showResetPasswordForm($token)
  {
    $vToken = $this->sVerification->isValidToken($token, self::TYPE_PASSWORD);
    
    if (!$vToken) {
      return abort(403);
    }

    return view(self::PATH . 'reset-password', ['token' => $vToken]);
  }

  public function activateAccount($token)
  {
    $vToken = $this->sVerification->isValidToken($token, self::TYPE_EMAIL);

    if (!$vToken) {
      return abort(404);
    }

    $this->sVerification->revokeToken($vToken);

    Auth::login($vToken->user);

    return redirect()->route('browser.home.index')->with(['success' => 'Successfully activated account.']);
  }
}
