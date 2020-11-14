<?php

namespace App\Http\Controllers\Browser\Profile;

use SEOTools;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
  public const PATH = 'browser.profile.';

  public function show()
  {
    //0 = Title, 1 = Description, 2 = Twitter Site
    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle('Profile &middot; ' . config('app.name') );
    SEOTools::setDescription($metas[1]['content']);
    SEOTools::setCanonical(route('browser.profile.show'));

    SEOTools::opengraph()->setUrl(route('browser.profile.show'));
    SEOTools::opengraph()->addProperty('type', 'articles');
    
    SEOTools::twitter()->setSite($metas[2]['content']);
    SEOTools::twitter()->setUrl(route('browser.profile.show'));

    SEOTools::jsonLd()->setType('Article');

    return view(self::PATH . 'show');
  }
}
