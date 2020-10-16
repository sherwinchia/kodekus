<?php

namespace App\Http\Controllers\Browser\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use SEO;
use Share;

class ArticleController extends Controller
{
  public const PATH = 'browser.articles.';

  public function show($category, $slug)
  {
    $article = Article::where('slug', $slug)->where('publish_date','<=',now())
                      ->where('published',1)
                      ->whereHas('category', function($query) use ($category){
                        $query->where('slug', $category);
                      })->first();

    if (!$article) {
      abort(404);
    }

    $share = Share::page(route('browser.articles.show', ['slug'=> $article->slug, 'category' => $article->category->slug]), $article->title)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->getRawLinks();

    $article->share = $share;

    $article->body = json_decode($article->body);

    SEO::setTitle($article->title);
    SEO::setDescription($article->description);

    return view(self::PATH . '.show', compact('article'));
  }
}
