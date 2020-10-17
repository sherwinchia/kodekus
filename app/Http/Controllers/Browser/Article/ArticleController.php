<?php

namespace App\Http\Controllers\Browser\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use SEOTools;
use Share;

class ArticleController extends Controller
{
  public const PATH = 'browser.articles.';

  public function index()
  {
    SEOTools::setTitle('Home');
    SEOTools::setDescription('This is my page description');
    SEOTools::opengraph()->setUrl('http://current.url.com');
    SEOTools::setCanonical('https://codecasts.com.br/lesson');
    SEOTools::opengraph()->addProperty('type', 'articles');
    SEOTools::twitter()->setSite('@LuizVinicius73');
    SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

    $tags = Tag::all()->filter(function ($tags){
      return $tags->articles->count() > 0;
    });;

    $categories = Category::all()->filter(function ($category){
      return $category->articles->count() > 0;
    });

    $latestArticles = Article::latest('publish_date')->take(6)->get();

    return view(self::PATH . 'index', compact(['tags', 'categories', 'latestArticles']));
  }

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

    $share = $article->share_link;

    $article->share = $share;

    $article->body = json_decode($article->body);

    SEOTools::setTitle($article->title);
    SEOTools::setDescription($article->description);
    SEOTools::opengraph()->setUrl($article->article_link);
    SEOTools::setCanonical($article->article_link);
    SEOTools::opengraph()->addProperty('type', 'articles');
    SEOTools::twitter()->setSite($article->article_link);

    return view(self::PATH . '.show', compact('article'));
  }
}
