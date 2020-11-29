<?php

namespace App\Http\Controllers\Browser\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Page;
use SEOTools;

class AuthorController extends Controller
{
  public const PATH = 'browser.authors.';

  public function show($slug)
  {
    $author = Profile::where('slug', $slug)->first();
    if ($author) {
      $author = $author->user;

    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle('Author &middot; ' . $author->full_name);
    SEOTools::setDescription($metas[1]['content']);
    SEOTools::setCanonical(route('browser.home.index'));

    SEOTools::opengraph()->setUrl(route('browser.authors.show', $slug));
    SEOTools::opengraph()->addProperty('type', 'articles');
    
    SEOTools::twitter()->setSite($metas[2]['content']);
    SEOTools::twitter()->setUrl(route('browser.authors.show', $slug));

      return view(self::PATH . 'show', compact(['author']));
    }
    abort('404');
  }
}
