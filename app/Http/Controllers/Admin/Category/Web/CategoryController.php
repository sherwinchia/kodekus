<?php

namespace App\Http\Controllers\Admin\Category\Web;

use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public const PATH = 'admin.categories.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function create()
  {
    return view(self::PATH.'create');
  }

  public function edit(Category $category)
  {
    return view(self::PATH.'edit',compact('category'));
  }
}
