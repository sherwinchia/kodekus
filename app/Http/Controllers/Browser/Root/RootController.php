<?php

namespace App\Http\Controllers\Browser\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RootController extends Controller
{
  public function index()
  {
    return redirect()->route('browser.home.index');
  }
}
