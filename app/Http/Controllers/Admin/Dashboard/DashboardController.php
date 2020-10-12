<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public const PATH = 'admin.dashboard.';
  
  public function index()
  {
    return view(self::PATH . 'index');
  }
}
