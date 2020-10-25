<?php

namespace App\Http\Controllers\Browser\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SEOTools;

class AboutController extends Controller
{
  public const PATH = 'browser.about.';

  public function index()
  {
    SEOTools::setTitle('About | ' . config('app.name') );
    SEOTools::setDescription('This is my page description');
    SEOTools::opengraph()->setUrl(route('browser.about.index'));
    SEOTools::setCanonical(route('browser.about.index'));
    SEOTools::opengraph()->addProperty('type', 'about');
    SEOTools::twitter()->setSite('@LuizVinicius73');
    SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');


    return view(self::PATH . 'index');
  }
}
