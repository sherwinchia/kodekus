<?php

namespace App\Http\Controllers\Admin\Permission\Web;

use Spatie\Permission\Models\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
  public const PATH = 'admin.permissions.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function create()
  {
    return view(self::PATH.'create');
  }

  public function edit(Permission $permission)
  {
    return view(self::PATH.'edit',compact('permission'));
  }
}