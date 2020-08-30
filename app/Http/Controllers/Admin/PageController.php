<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public const PATH = 'admin.';

    public function dashboard()
    {
      return view(self::PATH .'dashboard.index');
    }
    public function content()
    {
      # code...
    }
    public function user()
    {
      # code...
    }
}
