<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Share;

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
    'publish_date', 
    'published', 
    'featured', 
    'trending'
  ];

  public function tags()
  {
    return $this->belongsToMany('App\Models\Tag');
  }

  public function author()
  {
    return $this->belongsTo('App\Models\User', 'author_id');
  }

  public function category()
  {
    return $this->belongsTo('App\Models\Category', 'category_id');
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
}
