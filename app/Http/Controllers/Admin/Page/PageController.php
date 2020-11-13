<?php

namespace App\Http\Controllers\Admin\Page;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
  public const PATH = 'admin.pages.';

  public function __construct()
  {
    $this->middleware(['role:admin']);
  }
  
  public function index()
  {
    return view(self::PATH .'index');
  }

  public function edit(Page $page)
  {
    return view(self::PATH .'edit', compact('page'));
  }
}
