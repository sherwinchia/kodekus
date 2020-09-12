<?php

namespace App\Http\Controllers\Admin\Article\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Article as ArticleResource;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
  public function index()
  {
      $articles = Article::paginate(15);

      return ArticleResource::collection($articles);
  }
}
