<?php

namespace App\Http\Controllers\Browser\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use SEOTools;

class SearchController extends Controller
{
  public const PATH = 'browser.search.';

  public function index()
  {
    SEOTools::setTitle('Search | '. config('app.name') );
    SEOTools::setDescription('This is my page description');
    SEOTools::opengraph()->setUrl(route('browser.home.index'));
    SEOTools::setCanonical(route('browser.home.index'));
    SEOTools::opengraph()->addProperty('type', 'articles');
    SEOTools::twitter()->setSite('@LuizVinicius73');
    SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

    return view(self::PATH . 'index');
  }
}
