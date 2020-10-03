<?php

namespace App\Http\Controllers\Admin\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public const PATH = 'admin.pages.';

  public function show()
  {
    return view(self::PATH . 'profile');
  }

}
