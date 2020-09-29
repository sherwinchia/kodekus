<?php

namespace App\Http\Controllers\Admin\Backup\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackupController extends Controller
{
  public const PATH = 'admin.backups.';
  
  public function index()
  {
    return view(self::PATH . 'index');
  }
}
