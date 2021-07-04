<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public const PATH = 'admin.dashboard.';
  
  public function __construct()
  {
    $this->middleware(['role:admin']);
  }

  public function index()
  {
    $articles = Article::all();

    $articlesTotal = $articles->count();
    $usersTotal = User::all()->count();
    $pendingCommentsTotal = 0;

    foreach ($articles as $article) {
      $pendingCommentsTotal += $article->unapproved_comments_count;
      $pendingCommentsTotal += $article->unapproved_replies_count;
    }

    $latestArticles = Article::latest()->take(10)->get();

    return view(self::PATH . 'index', compact(['articlesTotal', 'usersTotal', 'pendingCommentsTotal', 'latestArticles']));
  }
}
