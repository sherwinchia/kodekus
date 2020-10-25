<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Article;

class CommentController extends Controller
{
  public const PATH = 'admin.comments.';

  public function index()
  {
    return view(self::PATH.'index');
  }

  public function show(Article $comment)
  {
    $article = $comment;
    return view(self::PATH.'show', compact('article'));
  }

  public function approval()
  {
    return view(self::PATH.'approval');
  }
}
