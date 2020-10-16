<?php

namespace App\Http\Controllers\Admin\Series;

use App\Models\Series;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public const PATH = 'admin.series.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function create()
  {
    return view(self::PATH.'create');
  }

  public function edit(Series $series)
  {
    return view(self::PATH.'edit',compact('series'));
  }
}
