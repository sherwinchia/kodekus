<?php

namespace App\Http\Controllers\Admin\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
  public const PATH = 'admin.logs.';
  
  public function __construct()
  {
    $this->middleware(['role:admin']);
  }
  
  public function index()
  {
    return view(self::PATH . 'index');
  }

}
