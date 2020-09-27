<?php

namespace App\Http\Controllers\Admin\Role\Web;

use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  public const PATH = 'admin.roles.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function create()
  {
    return view(self::PATH.'create');
  }

  public function edit(Role $role)
  {
    return view(self::PATH.'edit',compact('role'));
  }
}
