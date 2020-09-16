<?php

namespace App\Http\Controllers\Admin\Tag\Web;

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

  public function edit(Article $article)
  {
    return view(self::PATH.'edit',compact('article'));
  }
}
