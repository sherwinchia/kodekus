<?php

namespace App\Http\Controllers\Browser\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthorController extends Controller
{
  public const PATH = 'browser.authors.';

  public function show(User $author)
  {
    if ($author->role == 'admin') {
      return view(self::PATH . 'show', compact(['author']));
    }
    abort('404');
  }
}
