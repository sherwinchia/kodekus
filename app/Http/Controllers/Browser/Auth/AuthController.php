<?php

namespace App\Http\Controllers\Browser\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public const PATH = 'browser.auth.';

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
}
