<?php

namespace App\Http\Controllers\Browser\Series;

use SEOTools;
use App\Models\Page;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
  public const PATH = 'browser.series.';

  public function index()
  {
    //0 = Title, 1 = Description, 2 = Twitter Site
    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle('Series &middot; ' . config('app.name') );
    SEOTools::setDescription($metas[1]['content']);
    SEOTools::setCanonical(route('browser.series.index'));

    SEOTools::opengraph()->setUrl(route('browser.series.index'));
    SEOTools::opengraph()->addProperty('type', 'articles');
    
    SEOTools::twitter()->setSite($metas[2]['content']);
    SEOTools::twitter()->setUrl(route('browser.series.index'));

    SEOTools::jsonLd()->setType('Article');


    $series = Series::all()->filter(function($series){
      return $series->articles->count() > 0;
    });

    return view(self::PATH . 'index', compact(['series']));
  }
}
