<?php

namespace App\Http\Controllers\Admin\Log\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
  public const PATH = 'admin.logs.';
  
  public function index()
  {
    return view(self::PATH . 'index');
  }

}
