<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public const PATH = 'admin.users.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function create()
  {
    return view(self::PATH.'create');
  }

  public function edit(User $user)
  {
    return view(self::PATH.'edit',compact('user'));
  }
}
