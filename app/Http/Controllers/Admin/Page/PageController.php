<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public const PATH = 'admin.pages.';

  public function index()
  {
    return view(self::PATH .'index');
  }
}
