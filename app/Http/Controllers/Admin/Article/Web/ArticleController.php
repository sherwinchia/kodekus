<?php

namespace App\Http\Controllers\Admin\Article\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
  public const PATH = 'admin.article.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function edit(Article $article)
  {
    return view(self::PATH.'edit',compact('article'));
  }
}
