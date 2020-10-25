<?php

namespace App\Http\Controllers\Browser\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class AuthorController extends Controller
{
  public const PATH = 'browser.authors.';

  public function show($slug)
  {
    $author = Profile::where('slug', $slug)->first()->user;
    return view(self::PATH . 'show', compact(['author']));
    // if ($author->role == 'admin') {
    //   return view(self::PATH . 'show', compact(['author']));
    // }
    // abort('404');
  }
}
