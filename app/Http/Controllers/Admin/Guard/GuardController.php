<?php

namespace App\Http\Controllers\Admin\Guard;

use App\Models\Guard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuardController extends Controller
{
  public const PATH = 'admin.guards.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function create()
  {
    return view(self::PATH.'create');
  }

  public function edit(Guard $guard)
  {
    return view(self::PATH.'edit',compact('guard'));
  }
}
