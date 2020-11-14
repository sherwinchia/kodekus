<?php

namespace App\Http\Controllers\Browser\Home;

use Share;
use SEOTools;
use App\Models\Tag;
use App\Models\Page;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public const PATH = 'browser.home.';

  public function index()
  {
    //0 = Title, 1 = Description, 2 = Twitter Site
    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle('Home &middot; ' . config('app.name') );
    SEOTools::setDescription($metas[1]['content']);
    SEOTools::setCanonical(route('browser.home.index'));

    SEOTools::opengraph()->setUrl(route('browser.home.index'));
    SEOTools::opengraph()->addProperty('type', 'articles');
    
    SEOTools::twitter()->setSite($metas[2]['content']);
    SEOTools::twitter()->setUrl(route('browser.home.index'));

    SEOTools::jsonLd()->setType('Article');

    return view(self::PATH . 'index');
  }
}
