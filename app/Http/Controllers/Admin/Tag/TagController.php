<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
  public const PATH = 'admin.tags.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function create()
  {
    return view(self::PATH.'create');
  }

  public function edit(Tag $tag)
  {
    return view(self::PATH.'edit',compact('tag'));
  }
}
