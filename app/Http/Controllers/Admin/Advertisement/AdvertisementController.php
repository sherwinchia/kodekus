<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
  public const PATH = 'admin.advertisements.';

  public function __construct()
  {
    $this->middleware(['role:admin']);
  }
  
  public function index()
  {
    return view(self::PATH . 'index');
  }

  public function create()
  {
    return view(self::PATH . 'create');
  }

  public function edit()
  {
    return view(self::PATH . 'edit');
  }

}
