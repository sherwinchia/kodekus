<?php

namespace App\Http\Controllers\Admin\Article\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
  public const PATH = 'admin.articles.';

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

  public function delete(Article $article)
  {
    $article->delete();
    return redirect()->back()->withSuccess('Article successfully deleted!');
  }

}
