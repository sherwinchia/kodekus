<?php

namespace App\Http\Controllers\Admin\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
  public function index()
  {
    return redirect()->route('admin.dashboard.index');
  }
}
