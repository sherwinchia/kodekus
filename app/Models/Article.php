<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Share;
use App\Models\Article;

class Article extends Model
{
  use LogsActivity;

  protected static $logName = 'Article';
  
  protected $fillable = [
    'title', 
    'description', 
    'body', 
    'slug', 
    'image', 
    'category_id', 
    'series_id', 
    'publish_date', 
    'published', 
    'featured', 
    'trending',
    'read_minutes'
  ];

  public function tags()
  {
    return $this->belongsToMany('App\Models\Tag');
  }

  public function author()
  {
    return $this->belongsTo('App\Models\User', 'author_id');
  }

  public function series()
  {
    return $this->belongsTo('App\Models\Series', 'series_id');
  }

  public function category()
  {
    return $this->belongsTo('App\Models\Category', 'category_id');
  }

  public function bookmarks()
  {
    return $this->morphMany('App\Models\Bookmark', 'bookmarkable');
  }

  public function comments()
  {
    return $this->morphMany('App\Models\Comment', 'commentable');
  }

  public function likes()
  {
    return $this->morphMany('App\Models\Like', 'likeable');
  }

  public function getDescriptionForEvent(string $eventName): string
  {
      return $this->title . " has been {$eventName}";
  }

  public function getArticleLinkAttribute()
  {
    return route('browser.articles.show', ['slug'=> $this->slug, 'category' => $this->category->slug]);
  }

  public function getShareLinkAttribute()
  {
    $share = Share::page(route('browser.articles.show', ['slug'=> $this->slug, 'category' => $this->category->slug]), $this->title)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->getRawLinks();

    return $share;
  }

  public function getNextArticleAttribute()
  {
    //if article->share sort by ID
    if (isset($this->series)) {
      $nextId = Article::where('id', '>', $this->id)->where('series_id', $this->series->id)->latest('publish_date')->min('id');
    } else {
      $nextId = Article::where('id', '>', $this->id)->min('id');
    }
    $nextArticle = Article::find($nextId); 
    if ($nextArticle) {
      $nextArticle->link = route('browser.articles.show', ['slug'=> $nextArticle->slug, 'category' => $nextArticle->category->slug]);
      return $nextArticle;
    } else {
      return null;
    }
    
  }

  public function getPrevArticleAttribute()
  {
    if (isset($this->series)) {
      $prevId = Article::where('id', '<', $this->id)->where('series_id', $this->series->id)->latest('publish_date')->max('id');
    } else {
      $prevId = Article::where('id', '<', $this->id)->max('id');
    }
    $prevArticle = Article::find($prevId);
    if ($prevArticle) {
      $prevArticle->link = route('browser.articles.show', ['slug'=> $prevArticle->slug, 'category' => $prevArticle->category->slug]);
      return $prevArticle;
    } else {
      return null;
    }
  }

  public function getMoreArticlesAttribute()
  {
    $morePost = Article::inRandomOrder()->where('id', '!=', $this->id)->orWhere('series_id', $this->series_id)->take(3)->get();
    return $morePost;
  }

  public function getImageLinkAttribute()
  {
    if ($this->image) {
      return asset('storage/' . $this->image);
    } else {
      return asset('images/placeholder/placeholder.png');
    }
  }

  public function getAuthorLinkAttribute()
  {
    return route('browser.authors.show', $this->author->profile->slug);
  }

  public function getUnapprovedCommentsCountAttribute(Type $var = null)
  {
    return $this->comments()->where('approved', 0)->count();
  }

  public function getUnapprovedRepliesCountAttribute()
  {
    $count = 0;
    $comments = $this->comments;

    foreach ($comments as $comment) {
      $count += $comment->replies()->where('approved', 0)->count();
    }

    return $count;
  }
}
