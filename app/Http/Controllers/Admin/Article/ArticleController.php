<?php

namespace App\Http\Controllers\Admin\Article;

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
    if (auth('admin')->user()->hasRole('content-writer')) {
      $user = auth('admin')->user();

      $articles =  $user->articles;
      if ($articles->contains($article)) {
        return view(self::PATH.'edit',compact('article'));
      } else {
        return abort('403');
      }
    }
    // if (!$servicesImpacted->contains('name', $service->name))
    return view(self::PATH.'edit',compact('article'));
  }
}
