<?php

namespace App\Http\Controllers\Browser\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public const PATH = 'browser.profile.';

  public function show()
  {
    return view(self::PATH . 'show');
  }
}
