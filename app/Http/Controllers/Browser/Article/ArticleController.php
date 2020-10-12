<?php

namespace App\Http\Controllers\Browser\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use SEO;

class ArticleController extends Controller
{
  public const PATH = 'browser.articles.';

  public function show($slug)
  {
    $article = Article::where('slug', $slug)->where('published',1)->first();

    if (!$article) {
      abort(404);
    }

    $article->body = json_decode($article->body);

    SEO::setTitle($article->title);
    SEO::setDescription($article->description);

    return view(self::PATH . '.show', compact('article'));
  }
}
