<?php

namespace App\Http\Controllers\Browser\Series;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Series;
use SEOTools;

class SeriesController extends Controller
{
  public const PATH = 'browser.series.';

  public function index()
  {
    SEOTools::setTitle('Series | ' . config('app.name') );
    SEOTools::setDescription('This is my page description');
    SEOTools::opengraph()->setUrl(route('browser.series.index'));
    SEOTools::setCanonical(route('browser.series.index'));
    SEOTools::opengraph()->addProperty('type', 'series');
    SEOTools::twitter()->setSite('@LuizVinicius73');
    SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

    $series = Series::all()->filter(function($series){
      return $series->articles->count() > 0;
    });

    return view(self::PATH . 'index', compact(['series']));
  }
}
