<?php

namespace App\Http\Controllers\Admin\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
  public const PATH = 'admin.pages.';

  public function showLogin()
  {
    return view(self::PATH . 'login');
  }

  public function logout()
  {
    Auth::logout();
	  return redirect()->route('admin.login.show');
  }
}
