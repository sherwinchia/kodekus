<?php

namespace App\Http\Controllers\Browser\About;

use SEOTools;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
  public const PATH = 'browser.about.';

  public function index()
  {
    //0 = Title, 1 = Description
    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle('About &middot; ' . config('app.name') );
    SEOTools::setDescription($metas[1]['content']);
    SEOTools::setCanonical(route('browser.about.index'));

    SEOTools::opengraph()->setUrl(route('browser.about.index'));
    SEOTools::opengraph()->addProperty('type', 'articles');
    
    SEOTools::twitter()->setSite('@sherwinchia');
    SEOTools::twitter()->setUrl(route('browser.about.index'));

    SEOTools::jsonLd()->setType('Article');

    return view(self::PATH . 'index');
  }
}
