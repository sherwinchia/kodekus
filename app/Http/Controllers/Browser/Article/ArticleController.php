<?php

namespace App\Http\Controllers\Browser\Article;

use Share;
use SEOTools;
use App\Models\Tag;
use App\Models\Page;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
  public const PATH = 'browser.articles.';

  public function index()
  {

  }

  public function show($category, $slug)
  {
    $article = Article::where('publish_date','<=',now())
                      ->where('published',1)
                      ->where('slug', $slug)
                      ->whereHas('category', function($query) use ($category){
                        $query->where('slug', $category);
                      })->first();

    if (!$article) {
      abort(404);
    }

    $share = $article->share_link;

    $article->share = $share;

    $article->body = json_decode($article->body);

    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle($article->title);
    SEOTools::setDescription($article->description);
    SEOTools::setCanonical($article->article_link);

    SEOTools::opengraph()->setUrl($article->article_link);
    SEOTools::opengraph()->addProperty('type', 'articles');
    SEOTools::opengraph()->addImage($article->image_link);

    SEOTools::twitter()->setSite($metas[2]['content']);
    SEOTools::twitter()->setImage($article->image_link);
    SEOTools::twitter()->setUrl($article->article_link);

    SEOTools::jsonLd()->addImage($article->image_link);
    SEOTools::jsonLd()->setType('Article');

    return view(self::PATH . '.show', compact('article'));
  }
}
